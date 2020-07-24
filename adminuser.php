<?php
    session_start();
    error_reporting(0);
    require 'functions.php';
    include "security.php";

  $items = fetchData("SELECT * FROM admin");

  $i = 1;
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Kohiso Web Admin</title>
        <!-- Bootstrap core CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- Custom styles template ini-->
      <link href="asset/style/style_admin.css" rel="stylesheet" type="text/css" media="all">
      <link href="asset/style/style.css" rel="stylesheet" type="text/css" media="all">
      <!-- Custom Fonts Awesome-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
   </head>
   <body style="background-color: white; padding-right: 10%; padding-left: 10%">

      <h3 class="py-3" style="color: var(--purple)">Daftar admin</h3>


      <table class="table rounded shadow-sm table-striped" style="background-color: white">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Pengaturan</th>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Password</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($items as $item):?>
            <tr>
              <th scope="row"><?= $i; ?></td>
              <td>
                <button class="btn btn-sm btn-outline-dark w-25 mr-2" onclick="window.location.href='gantiadmin.php?id=<?= $item['id'] ?>'">Edit</button>
                <button class="btn btn-sm btn-outline-dark w-25" onclick="window.location.href='hapusadmin.php?id=<?= $item['id'] ?>'">Delete</button>

              </td>
              <?= "<td>".$item['id']."</td>" ?>
              <?= "<td>".$item['username']."</td>" ?>
              <?= "<td>".$item['password']."</td>" ?>
            </tr>
            <?php $i++ ?>
          <?php endforeach; ?>
        </tbody>
      </table>

   </body>
 </html>
