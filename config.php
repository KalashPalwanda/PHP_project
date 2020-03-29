<?php
class imageGallery {

    private $sql, $query;
    function __construct() {
        /* DB Connection */
        $this->sql = new mysqli('localhost', 'root', '', 'mediagallery');
    }
    /*
    |--------------------------------------------------------------------------
    | Get Gallery
    |--------------------------------------------------------------------------
    */
    function getGalley() {
        if ($query = $this->sql->query("SELECT * FROM `media` ORDER BY media_id ASC ")) {
            $rows = array();
            while ($row = $query->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return "Error";
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Insery/Update
    |--------------------------------------------------------------------------
    */
    function addEdit($table_name, $data_array, $where = array()) {
        if ($table_name && is_array($data_array)) {

            if (!empty($where)) {
                /* Update */
                foreach ($data_array AS $key => $val) {
                    $value[] = $key . '=' . "'" . $this->sql->real_escape_string($val) . "'";
                }
                foreach ($where AS $key => $val) {
                    $whr[] = $key . '=' . "'" . $this->sql->real_escape_string($val) . "'";
                }
                $value = implode($value, ',');
                $whr = implode($whr, ',');
                $this->sql->query("UPDATE `$table_name` SET $value WHERE $whr");
            } else {
                /* Insert */
                foreach ($data_array AS $key => $val) {
                    $field[] = $key;
                    $value[] = "'" . $this->sql->real_escape_string($val) . "'";
                }
                $field = implode($field, ',');
                $value = implode($value, ',');
                $this->sql->query("INSERT INTO `$table_name` ($field) VALUES($value) ");
            }
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Create directory if not exists
    |--------------------------------------------------------------------------
    */
    function createDir($path) {
        if (!file_exists($path)) {
            $old_mask = umask(0);
            mkdir($path, 0777, TRUE);
            umask($old_mask);
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Thumbnail Creation
    |--------------------------------------------------------------------------
    */
    function createThumb($path1, $path2, $file_type, $new_w, $new_h, $squareSize = '') {
        /* Read the source image Starts */
        $source_image = FALSE;
        if (preg_match("/jpg|JPG|jpeg|JPEG/", $file_type)) {
            $source_image = imagecreatefromjpeg($path1);
        } elseif (preg_match("/png|PNG/", $file_type)) {
            if (!$source_image = @imagecreatefrompng($path1)) {
                $source_image = imagecreatefromjpeg($path1);
            }
        } elseif (preg_match("/gif|GIF/", $file_type)) {
            $source_image = imagecreatefromgif($path1);
        }
        if ($source_image == FALSE) {
            $source_image = imagecreatefromjpeg($path1);
        }
        /* Read the source image Ends */

        /* Manage Image Orientation Starts */
        $exif = @exif_read_data($path1);
        if (!empty($exif['Orientation'])) {
            switch ($exif['Orientation']) {
                case 8:
                    $source_image = imagerotate($source_image, 90, 0);
                    break;
                case 3:
                    $source_image = imagerotate($source_image, 180, 0);
                    break;
                case 6:
                    $source_image = imagerotate($source_image, -90, 0);
                    break;
            }
        }
        /* Manage Image Orientation Ends */


        $orig_w = imageSX($source_image);
        $orig_h = imageSY($source_image);

        if ($orig_w < $new_w && $orig_h < $new_h) {
            $desired_width = $orig_w;
            $desired_height = $orig_h;
        } else {
            $scale = min($new_w / $orig_w, $new_h / $orig_h);
            $desired_width = ceil($scale * $orig_w);
            $desired_height = ceil($scale * $orig_h);
        }

        if ($squareSize != '') {
            $desired_width = $squareSize;
            $desired_height = $squareSize;
        }

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
        /* For PNG set white background */
        $kek = imagecolorallocate($virtual_image, 255, 255, 255);
        imagefill($virtual_image, 0, 0, $kek);

        if ($squareSize == '') {
            /* copy source image at a resized size */
            imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $orig_w, $orig_h);
        } else {
            $wm = $orig_w / $desired_width;
            $hm = $orig_h / $desired_height;
            $h_height = $desired_height / 2;
            $w_height = $desired_width / 2;

            if ($orig_w > $orig_h) {
                $adjusted_width = $orig_w / $hm;
                $half_width = $adjusted_width / 2;
                $int_width = $half_width - $w_height;
                imagecopyresampled($virtual_image, $source_image, -$int_width, 0, 0, 0, $adjusted_width, $squareSize, $orig_w, $orig_h);
            } elseif (($orig_w <= $orig_h)) {
                $adjusted_height = $orig_h / $wm;
                $half_height = $adjusted_height / 2;
                imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $adjusted_height, $orig_w, $orig_h);
            } else {
                imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $orig_w, $orig_h);
            }
        }

        if (@imagejpeg($virtual_image, $path2, 90)) {
            imagedestroy($virtual_image);
            imagedestroy($source_image);
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

/* Create Object */
$obj = new imageGallery();
?> 