<?php
    session_start();
    error_reporting(0);
    require 'functions.php';
    include "security.php";


  $id = $_GET["id"];


  $item = fetchData("SELECT * FROM admin WHERE id = '$id'")[0];

  $username = $item['username'];
  $password = $item['password'];
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Kohiso Admin</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel='stylesheet' type="text/css" href="asset/style/style.css">
</head>
   </head>
   <body style="background-color: white; color: var(--purple); padding: 35%; padding-top: 10%; padding-bottom: 0">
      <div class="text-center rounded shadow p-3">
       <h5 class="pb-2">Edit Admin</h5><br>
       <form class="px-3" method="post">
          <input type="hidden" name="id" value="<?= $item["id"] ?>">
          <div class="d-flex justify-content-between pb-3">
            <label for="name">Username</label>
            <input type="text" name="username" id="username" value="<?php echo $item['username'];?>" required>
          </div>
          <div class="d-flex justify-content-between">
            <label for="deskripsi">Password</label>
            <input type="password" name="password" id="password" value="<?php echo $item['password'];?>" required>   
          </div><br>
          <button class="btn btn-outline-dark rounded-pill mx-2" type="button" onclick="window.location.href='./adminuser.php'">cancel</button>
          <button class="btn btn-outline-dark rounded-pill mx-2" type="submit" name="submit">submit</button>
        </form>
      </div>

     <?php
     if($_SERVER["REQUEST_METHOD"] == "POST"):
        if(editAdmin($_POST)>-1):
          echo "<script>
              alert('berhasil');
              document.location.href = 'adminuser.php';
              </script>";
        else:
          echo "<script>
              alert('gagal');
              </script>";
        endif;
     endif;
      ?>


   </body>
 </html>
