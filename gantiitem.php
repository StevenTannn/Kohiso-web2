<?php
  session_start();
    error_reporting(0);
    require 'functions.php';
    include "security.php";

  $id = $_GET["id"];


  $item = fetchData("SELECT * FROM item WHERE id = '$id'")[0];

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <h1>EDIT ITEM</h1>
     <form class="" method="post">
       <input type="hidden" name="id" value="<?= $item["id"] ?>">
       <label for="name">Name:</label>
       <input type="text" name="name" id="name" value="<?= $item["name"] ?>">
       <br>
       <label for="deskripsi">deskripsi:</label>
       <input type="text" name="deskripsi" id="deskripsi" value="<?= $item["deskripsi"] ?>">
       <br>
       <label for="harga">harga</label>
       <input type="text" name="harga" id="harga" value="<?= $item["harga"] ?>">
       <br>
       <button type="submit" name="submit">submit</button>
     </form>

     <?php
     if(isset($_POST["submit"])):
       if(updateData($_POST)>0):
         echo "<script>
              alert('berhasil');
              document.location.href = 'tampilan.php';
              </script>";
       else :
         echo "gagal";
       endif;
     endif;
      ?>

      <a href="tampilan.php">kembali</a>


   </body>
 </html>
