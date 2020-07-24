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
     <title>Kohiso Admin</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel='stylesheet' type="text/css" href="asset/style/style.css">
    <link rel='stylesheet' type="text/css" href="asset/style/style_admin.css">
    
  </head>
  <body style="background-color: white; color: var(--purple); padding: 33%; padding-top: 10%; padding-bottom: 0">
    <?php 
      $username = $password = $cpassword = $errpass= "";
      if (isset($_POST["submit"])):
        if ($_POST["password"] == $_POST["cpassword"]):
          if (addAdmin($_POST)>0):
            echo "
            <script>
            alert('Admin berhasil ditambahkan');
            document,location.href = 'adminuser.php';
            </script>";
          else:
            echo "
            <script>
            alert('Gagal');
            </script>";
          endif;
        else:
          $username = $_POST['username'];
          $password = $_POST['password'];
          $cpassword = $_POST['cpassword'];
          $errpass = "*password tidak sesuai";
        endif;
       endif; 
    ?>
      <div class="text-center rounded shadow p-3">
       <h5 class="pb-2">Add Admin</h5><br>
       <form class="px-3" method="post">
          <input type="hidden" name="id" value="<?= $item["id"] ?>">
          <div class="d-flex justify-content-between pb-3">
            <label for="name">Username</label>
            <input type="text" name="username" id="username" value="<?php echo $username;?>" required>
          </div>
          <div class="d-flex justify-content-between pb-3">
            <label for="deskripsi">Password</label>
            <input type="password" name="password" id="password" value="<?php echo $password;?>" required>   
          </div>
          <div class="d-flex justify-content-between">
            <label for="deskripsi">Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword" value="<?php echo $cpassword;?>" required>   
          </div>
          <span class="text-danger" style="font-size: 15px"><?php echo $errpass;?></span><br>
          <br>
          <button class="btn btn-outline-dark rounded-pill mx-2" type="button" onclick="window.location.href='./adminuser.php'">cancel</button>
          <button class="btn btn-outline-dark rounded-pill mx-2" type="submit" name="submit">submit</button>
        </form>
      </div>

    

  </body>
</html>
