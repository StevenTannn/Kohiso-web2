<?php
    session_start();
    error_reporting(0);
    require 'functions.php';
    include "security.php";

  $items = fetchData("SELECT * FROM account");

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
      <h3 class="py-3" style="color: var(--purple)">User List</h3>
      <table class="table rounded shadow-sm table-striped display" style="background-color: white" id="adminTabel">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Setting</th>
            <th scope="col">User ID</th>
            <th scope="col">Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Gender</th>
            <th scope="col">Username</th>
            <th scope="col">Address</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($items as $item):?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td>
                <button class="btn btn-sm btn-outline-primary mr-2 mb-2 w-75" onclick="window.location.href='editUser.php?id=<?= $item['id'] ?>'">Edit</button>
                <form class=""  method="post" onsubmit="return confirm('Are you sure to delete this user ?');">
                  <input type="hidden" name="id" value="<?= $item["id"]  ?>">
                  <button type="submit" class="btn btn-sm btn-outline-danger w-75" name="delete">Delete</button>
                </form>

              </td>
              <?= "<td>".$item["id"]."</td>" ?>
              <?= "<td>".$item["FirstName"]. " " .$item["LastName"]. "</td>" ?>
              <?= "<td>".$item["PhoneNum"]."</td>" ?>
              <?= "<td>".$item["Gender"]."</td>" ?>
              <?= "<td>".$item["Username"]."</td>" ?>
              <?= "<td>".$item["Address"]."</td>" ?>
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


 <?php
    if (isset($_POST["delete"])) {
      if (deleteAccount($_POST)>0) {
        echo "<script>
              alert('User are succesfully deleted from system')
              document.location.href = 'useraccount.php'
              </script>";
      }else {
        echo "<script>
              alert('Failed to delete user')
              </script>";
      }
    }
  ?>
