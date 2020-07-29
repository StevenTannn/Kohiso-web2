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
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <!-- Custom styles template ini-->
      <link href="asset/style/style_admin.css" rel="stylesheet" type="text/css" media="all">
      <link href="asset/style/style.css" rel="stylesheet" type="text/css" media="all">
      <!-- Custom Fonts Awesome-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
       <script type="text/javascript" src="admin.js"></script>
   </head>
   <body style="background-color:white;">
       <div id="wrapper">
        <?php
        require "setting_navbar.php";
        ?>
        <div id="page-wrapper">
           <div class="container">
      <h3 class="py-3" style="color: var(--purple)">Admin List</h3>
      <table class="table rounded shadow-sm table-striped display" style="background-color: white" id="adminTabel">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Settings</th>
            <th scope="col">Admin ID</th>
            <th scope="col">Name</th>
            <th scope="col">Password</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($items as $item):?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td>
                <button class="btn btn-sm btn-outline-primary w-25 mr-2" onclick="window.location.href='gantiadmin.php?id=<?= $item['id'] ?>'">Edit</button>
                <a class="btn btn-sm btn-outline-danger w-25" onclick="javascript: return confirm('Menghapus ?');" href="hapusadmin.php?id=<?= $item['id'] ?>">Delete</a>

              </td>
              <?= "<td>".$item['id']."</td>" ?>
              <?= "<td>".$item['username']."</td>" ?>
              <?= "<td>".$item['password']."</td>" ?>
            </tr>
            <?php $i++ ?>
          <?php endforeach; ?>
        </tbody>
      </table>  
            </div>
       </div>
    </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>  
   </body>
 </html>