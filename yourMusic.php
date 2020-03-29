<?php
include("includes/includedFiles.php");
?>

<!DOCTYPE html>
<html>
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
}

.header {
  text-align: center;
  padding: 32px;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
  max-width: 25%;
  padding: 0 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    -ms-flex: 50%;
    flex: 50%;
    max-width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    -ms-flex: 100%;
    flex: 100%;
    max-width: 100%;
  }
}

//slide

* {box-sizing: border-box;}

.container {
  position: relative;
  width: 100%;
  max-width: 300px;
}

.image {
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
}

.overlay {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1; 
  width: 100%;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 20px;
  text-align: center;
  font-family: open sans;

}

.container:hover .overlay {
  opacity: 1;

</style>
<body>

<!-- Header -->
<div class="header">
  <h1>Artists Gallery</h1>
  
</div>

<!-- Photo Grid -->
<div class="row"> 
  <div class="column">
    <div class="container">
    <img class="image" src="artist image/12.jfif"><div class="overlay">Bae Suzy</div>
</div>
      
  <div class="container">
    <img src="artist image/2.jpg" style="width:100%">

    <div class="overlay">Billie Eilish</div>
</div>
<div class="container">
    <img src="artist image/3.jpg" style="width:100%">
    <div class="overlay">Billie Eilish</div>
</div>
<div class="container">
    <img src="artist image/16.jfif" style="width:100%">
    <div class="overlay">Iggy Azalea</div>
</div>
<div class="container">
    <img src="artist image/10.jfif" style="width:100%">
    <div class="overlay">Kim Yeri</div>
</div>
<div class="container">
    <img src="artist image/11.jfif" style="width:100%">
    <div class="overlay">Bae Suzy</div>
</div>
<div class="container">
    <img src="artist image/4.jpg" style="width:100%">
    <div class="overlay">Billie Eilish</div>
</div>
  </div>



  <div class="column">
    <div class="container">
    <img src="artist image/13.jfif" style="width:100%">
<div class="overlay">Shawn Mendes</div>
</div>
<div class="container">
    <img src="artist image/14.jfif" style="width:100%">
    <div class="overlay">Pink Floyd</div>
</div>
<div class="container">
    <img src="artist image/15.jfif" style="width:100%">
    <div class="overlay">Pink Floyd</div>
</div>
<div class="container">
    <img src="artist image/9.jfif" style="width:100%">
    <div class="overlay">Rihanna</div>
</div>
<div class="container">
    <img src="artist image/8.jfif" style="width:100%">
    <div class="overlay">Zayn Malik</div>
</div>
<div class="container">
    <img src="artist image/7.jfif" style="width:100%">
    <div class="overlay">Zayn Malik</div>
</div>
  </div>  


  <div class="column">
    <div class="container">
    <img src="artist image/6.jfif" style="width:100%">
    <div class="overlay">Halsey</div>
</div>
<div class="container">
    <img src="artist image/5.jfif" style="width:100%">
    <div class="overlay">Billie Eilish</div>
</div>
<div class="container">
    <img src="artist image/17.jfif." style="width:100%">
    <div class="overlay">Aurora</div>
</div>
<div class="container">
    <img src="artist image/18.jfif" style="width:100%">
    <div class="overlay">Daya</div>
</div>
<div class="container">
    <img src="artist image/19.jpg" style="width:100%">
    <div class="overlay">Daya</div>
</div>
<div class="container">
    <img src="artist image/20.png" style="width:100%">
    <div class="overlay">The Cranberries</div>
</div>
<div class="container">
    <img src="artist image/21.jfif" style="width:100%">
    <div class="overlay">Drake</div>
</div>
  </div>
  <div class="column">
    <div class="container">
    <img src="artist image/24.jpg" style="width:100%">
    <div class="overlay">M.O</div>
</div><div class="container">
    <img src="artist image/23.jfif" style="width:100%">
    
    <div class="overlay">Eminem</div>
</div>
<div class="container">
    <img src="artist image/23.jpg" style="width:100%">
    <div class="overlay">Bhad Bhabie</div>
</div>
<div class="container">
    <img src="artist image/22.jfif" style="width:100%">
    <div class="overlay">Adele</div>
</div>
<div class="container">
    <img src="artist image/24.jfif" style="width:100%">
    <div class="overlay">Katy Perry</div>
</div>
<div class="container">
    <img src="artist image/25.jpg" style="width:100%">
    <div class="overlay">Ed Sheeran</div>
</div>
    
  </div>
</div>
<br>
<br>

</body>
</html>