<?php

session_start();



require 'functions.php';

$items = fetchData("SELECT * FROM item");

 ?>

<html>

<head>
    <title>Kohiso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel='stylesheet' type="text/css" href="asset/style/style.css">
</head>

<body>
    <div class="head-container">
        <div class="container-img">
            <img src="asset/img/head.png">
        </div>
        <div class='container-main'>
            <?php include "navbar.php" ?>

            <div class="head-title">
                <h1>Shop</h1>
            </div>

        </div>
    </div>

    <div class="product-view">
        <div class="container">

            <h2 class='text-purple font-weight-bold'>OUR PRODUCT</h2>
            <div id="product">

              <?php foreach ($items as $item): ?>
                <form action="addcart.php" method="post">
                  <div class="product card mx-3 my-3">
                      <img src='asset/img/product.png' class='product-img' height="100%">
                      <div class="product-detail">
                          <h3><?= $item["name"] ?></h3>
                          <p class="mt-2">Rp.<?= $item["harga"] ?></p>
                          <small><?= $item["deskripsi"] ?></small>
                          <input type="hidden" name="name" value="<?= $item["name"] ?>">
                          <input type="hidden" name="harga" value="<?= $item["harga"] ?>">
                          <button type="submit" name="addtocart" class="btn btn-sm rounded-pill btn-info">add to cart</button>
                      </div>
                  </div>
                </form>
              <?php endforeach; ?>


          <?php

           ?>
        </div>
    </div>



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
