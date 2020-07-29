<?php
  session_start();
  $username = $_SESSION["username"];

  if (!isset($_SESSION["signin"])) {
    header("Location: signin.php");
  }else {
    require 'functions.php';

    $items = fetchData("SELECT * FROM cart WHERE username = '$username'  ");
    $user = fetchData("SELECT * FROM account WHERE Username = '$username' ")[0];
    $transactions = fetchData("SELECT * FROM checkout WHERE username = '$username'");
  
  }


  $totalHarga = 0;
 ?>

<html>

<head>
    <title>Kohiso</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel='stylesheet' type="text/css" href="asset/style/style.css">
</head>

<body style="background-color: white;">
    <div class="head-container" style="height: 60%; background-color: black">
        <div class="container-img">
            <img src="asset/img/cart.png">
        </div>
        <div class='container-main'>
           <?php include "navbar.php" ?>


            <div class="head-title fade-in-section" style="margin-top: 1rem">
                <h1>Account</h1>
            </div>

        </div>
    </div>

  <div class="row container mx-auto" style="padding-top: 50px">
    <div class="col-2 nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="kohiso-btn account-btn rounded-pill my-2 text-center active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
      <a class="kohiso-btn account-btn rounded-pill my-2 text-center" id="v-pills-cart-tab" data-toggle="pill" href="#v-pills-cart" role="tab" aria-controls="v-pills-cart" aria-selected="true">Cart</a>
      
      <a class="kohiso-btn account-btn rounded-pill my-2 text-center" id="v-pills-trans-tab" data-toggle="pill" href="#v-pills-trans" role="tab" aria-controls="v-pills-trans" aria-selected="false">Transaction</a>
    </div>
    <div class="col-10 tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <div class="row" style="color: black; margin: 100px; margin-top: 0">
          <div class="col-2 mb-5">
            <img src="asset/img/user.png" class="w-100">
          </div>
          <div class="col-8 mb-5" style="align-self: center;">
            <h5>My Profile</h5>
          </div>
          <div class="col-4 mb-3 py-1">
            <h5>Name</h5>
          </div>
          <div class="col-5">
            <h5 class="w-100 rounded border px-3 py-1 m-0"><?= $user["FirstName"] . " " . $user["LastName"] ?></h5>
          </div>
          <div  class="col-4 mb-3 py-1">
            <h5>Phone Number</h5>
          </div>
          <div class="col-5">
            <h5 class="w-100 rounded border px-3 py-1 m-0"><?= $user["PhoneNum"] ?></h5>
          </div>
          <div  class="col-4 mb-3 py-1">
            <h5>Gender</h5>
          </div>
          <div class="col-5">
            <h5 class="w-100 rounded border px-3 py-1 m-0"><?= $user["Gender"] ?></h5>
          </div>
          <div  class="col-4 mb-3 py-1">
            <h5>Address</h5>
          </div>
          <div class="col-5">
            <h5 class="w-100 rounded border px-3 py-1 m-0"><?= $user["Address"] ?></h5>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="v-pills-cart" role="tabpanel" aria-labelledby="v-pills-cart-tab">
        <div class="cart-container row m-0" style="color: black">
          <div class="col-8">
              <?php $cartCount = 0; ?>

              <?php foreach ($items as $item): ?>

                <div class="row pb-3 m-0 border-bottom">
                  <div class="col-11" style="padding: 0; padding-left: 2rem">
                        <h3><?= $item["nama"] ?></h3>
                        <p>Price: <?= $item["harga"] ?></p>
                        <a onclick="javascript: return confirm('Menghapus ?');" href="deleteCartItem.php?id=<?= $item['id'] ?>"><img src="asset/img/trash.png" style="width: 5%; position: absolute; bottom: 1rem; right: 1rem"></a>
                  </div>
                </div>
                <?php

                  $namaBarang = $item["nama"];
                  $hargastr = $item["harga"];
                  $hargaint = (int)$hargastr;
                  $totalHarga = $totalHarga + $hargaint;
                  $arrCart[$cartCount] =  array(
                    "username" => $username,
                    "itemName" => $namaBarang,
                    "itemPrice" => $hargaint
                  );
                $cartCount++;
                ?>
              <?php endforeach; ?>

              <?php if ($items == null): ?>
                <div class="w-100 text-center">
                  <img style="width: 150px" src="asset/img/cart-empty.png">
                  <h5 class="mt-4">Your cart is empty. Let's go <a class="text-primary" href="shop.php">shopping</a></h5>
                </div>
              <?php endif; ?>


          </div>
              <div class="col-4 p-3 px-4">
                  <div class="border rounded shadow-sm" style="padding: 2rem">
                      <h5><strong>Order Summary</strong></h5>
                      <div class="d-flex justify-content-between border-bottom pb-2">
                          <div>Total Price</div>
                          <div><strong>Rp. <?= $totalHarga ?></strong></div>
                      </div>
                      <form class=""  method="post">
                        <button type="submit" class="btn btn-danger w-100 mt-2" name="checkout">CHECK OUT</button>
                      </form>
                  </div>
              </div>
        </div>
      </div>
      <div class="tab-pane fade" id="v-pills-trans" role="tabpanel" aria-labelledby="v-pills-trans-tab">
        <div class="cart-container m-0" style="color: black">
          <?php foreach ($transactions as $transaction): ?>

            <div class="row pb-3 mb-3">
              <div class="col-8 border-bottom" style="padding: 0; padding-left: 2rem">
                    <h3><?= $transaction["nama"] ?></h3>
                    <p>Price: <?= $transaction["harga"] ?></p>
                    <p>Status: <?= $transaction["status"] ?></p>
              </div>
            </div>
          <?php endforeach; ?>
          <?php if ($transactions == null): ?>
            <div class="w-75 text-center">
              <img style="width: 150px" src="asset/img/transaction.png">
              <h5 class="mt-4">Your have no transaction. Let's go <a class="text-primary" href="shop.php">shopping</a></h5>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
    </div>
  </div>
  

  



      <?php if (isset($_POST["checkout"])): ?>
        <?php if ($items == null): ?>
            <script>
              alert("Your cart is empty")
              document,location.href = 'shop.php';
            </script>
          <?php else: ?>
            <?php foreach ($arrCart as $key => $value): ?>
              <?php if (checkout($value) > 0): ?>
                <?php clearCart($username); ?>
                <script>
                  alert('Thankyou');
                  document,location.href = 'shop.php';
                  document.location.href = 'shop.php';
                </script>
              <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
      <?php endif; ?>


      <?php
        require "footer.php";
      ?>

    <script src="asset/script/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
