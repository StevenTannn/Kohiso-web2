<?php
    session_start();
    error_reporting(0);
    require 'functions.php';
    include "security.php";

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <h1>ADD ITEM</h1>
     <form class="" method="post">
       <label for="name">Name:</label>
       <input type="text" name="name" id="name" value="">
       <br>
       <label for="deskripsi">deskripsi:</label>
       <input type="text" name="deskripsi" id="deskripsi" value="">
       <br>
       <label for="harga">harga</label>
       <input type="text" name="harga" id="harga" value="">
       <br>
       <button type="submit" name="submit">add</button>
     </form>

     <?php
     if(isset($_POST["submit"])):
       if(addItem($_POST)>0):
         echo "berhasil";
       else :
         echo "gagal";
       endif;
     endif;
      ?>


   </body>
 </html>
