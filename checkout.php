<?php
 require 'functions.php';
  include "security.php";
 $results = fetchData("SELECT * FROM checkout ORDER BY status");
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
              <h1 class="py-3" style="color: var(--purple)">View Transaction</h1>

              <table class="table rounded shadow-sm table-striped display" style="background-color: white" id="adminTabel">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Transaction</th>
                    <th scope="col">Username</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($results as $result): ?>
                    <tr>
                      <td><?=$i ?></td>
                      <td><?= $result["id"]; ?></td>
                      <td><?= $result["username"];  ?></td>
                      <td><?= $result["nama"]; ?></td>
                      <td><?= $result["harga"] ?></td>
                      <td><?= $result["status"] ?></td>
                      <td>
                      <form class=""  method="get">
                        <input type="hidden" name="id" value="<?= $result["id"]  ?>">
                        <input type="hidden" name="username" value="<?= $result["username"]  ?>">
                        <input type="hidden" name="nama" value="<?= $result["nama"]  ?>">
                        <input type="hidden" name="harga" value="<?= $result["harga"]  ?>">
                        <input type="hidden" name="status" value="<?= $result["status"]  ?>">
                        <?php $delete = false; ?>
                        <button class="btn btn-sm btn-outline-primary mr-2" type="submit" name="kirim">Send</button>
                        <button class="btn btn-sm btn-outline-warning mr-2" type="submit" name="batal">Cancel</button>
                        <button class="btn btn-sm btn-outline-danger mr-2" type="submit" name="hapus">Erase</button>
                      </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
           </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

       <?php
        if (isset($_GET["hapus"])) {
            if (hapusCheckout($result["id"]) > 0) {
              echo "
              <script>
                alert ('Sucess to erase transaction')
                document location.href = 'checkout.php';
              </script>
              ";
            }else {
              echo "
                <script>
                  alert('Fail to erase')
                </script>
              ";
            }
          }


        if (isset($_GET["kirim"])) {
          if (kirim($_GET)>0) {
            echo "
            <script>
              alert ('Transaction status has been changed to sent')
              document.location.href = 'checkout.php';
            </script>
            ";
          }else {
            echo "
              <script>
                alert('Error while changing status')
                document.location.href = 'checkout.php';
              </script>
            ";
          }
        }

        if (isset($_GET["batal"])) {
          if (batal($_GET)>0) {
            echo "
            <script>
              alert ('Transaction status has been changed to canceled')
              document.location.href = 'checkout.php';
            </script>
            ";
          }else {
            echo "
              <script>
                alert('Error while changing status')
                document.location.href = 'checkout.php';
              </script>
            ";
          }
        }
        ?>
   </body>
 </html>
