<?php
  session_start();
  $username = $_SESSION["username"];

  if (!isset($_SESSION["signin"])) {
    header("Location: signin.php");
  }else {
    require 'functions.php';

    $items = fetchData("SELECT * FROM cart WHERE username = '$username'  ");

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

<body>
    <div class="head-container" style="height: 60%">
        <div class="container-img">
            <img src="asset/img/cart.png">
        </div>
        <div class='container-main'>
           <?php include "navbar.php" ?>


            <div class="head-title fade-in-section" style="margin-top: 1rem">
                <h1>Cart</h1>
            </div>

        </div>
    </div>


	<div class="cart-container row m-0" style="color: black">
		<div class="col-8">
          <?php $cartCount = 0; ?>



          <?php foreach ($items as $item): ?>

            <div class="row pb-3 m-0 border-bottom">
      			<div class="col-3 p-0">
      				<img src="asset/img/prd-img.png" class="w-100">
      			</div>
    			<div class="col-9" style="padding: 0; padding-left: 2rem">
          			<h3><?= $item["nama"] ?></h3>
          			<p>Price: <?= $item["harga"] ?></p>
                    <a href="deleteCartItem.php?id=<?= $item['id'] ?>"><img src="asset/img/trash.png" style="width: 5%; position: absolute; bottom: 1rem; right: 1rem"></a>
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
            <h1>Keranjang kamu kosong ayo belanja</h1>
          <?php endif; ?>




		</div>
        <div class="col-4 p-3 px-4">
            <div class="border rounded shadow-sm" style="padding: 2rem">
                <h5><strong>Order Summar</strong></h5>
                <div class="d-flex justify-content-between border-bottom pb-2">
                    <div>Sub Total</div>
                    <div><strong>Rp. <?= $totalHarga ?></strong></div>
                </div>
                <form class=""  method="post">
                  <button type="submit" class="btn btn-danger w-100 mt-2" name="checkout">CHECK OUT</button>
                </form>
            </div>
        </div>
	</div>

      <?php if (isset($_POST["checkout"])): ?>
        <?php if ($totalHarga > 0): ?>
          <?php if (checkout($value) > 0): ?>
            <?php clearCart($username); ?>
            <?php header("Location:index.php"); ?>
          <?php endif; ?>
        <?php else: ?>
          <script>
            alert("tidak ada barang di Keranjang")
          </script>
        <?php endif; ?>

      <?php endif; ?>


    <div class="footer">
        <div class="row footer">
            <div class="col-4 font-weight-bold">
                <a href=index.html class="footer-link">HOME</a>
                <a href=shop.html class="footer-link">SHOP</a>
                <a href=press.html class="footer-link">PRESS</a>
                <a href=us.html class="footer-link">ABOUT US</a>
                <a href=contact.html class="footer-link">CONTACT US</a>
            </div>
            <div class="col-8">
                <p class="font-weight-bold">Subcription</p>
                <p>Never run out of your favorite coffees, teas and powders again with our auto-delivery subscription. Select how often your products arrive, pause and cancel anytime</p>
                <div class="row">
                    <div class="col-5">
                        <input class="form-control">
                    </div>
                    <div class="col-4 pr-0">
                        <button class="btn kohiso-btn purple-bg py-2 px-3">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 text-black text-center">
            <a class="navbar-brand" href="/index.html">
                <img src="asset/img/Logo.png" class='logo'>
            </a>
            <br>
            COPYRIGHT KEVIN FERICCO
        </div>
    </div>

    <script src="asset/script/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
