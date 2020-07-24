<?php
  session_start();
 ?>
<html>

<head>
    <title>Kohiso</title>
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

            <div class="head-title fade-in-section" style="margin-top: 3rem">
                <p>it's</p>
                <h1>Coffee Time</h1>
            </div>

        </div>
    </div>

    <div class="reward-container">
        <div class="container-img-no-overlay">
            <img src="asset/img/reward.png">
        </div>
        <div class='container-main'>
            <div class="reward fade-in-section">
                <h2>Kohiso Rewards</h2>
                <p>Order Ahead and Mobile Pay using KoHiSo app.</p>

                <div class='action'>
                    <a class="btn kohiso-btn re-btn mr-2" href="cv.html">Curiculum</a>
                    <a class="btn kohiso-btn re-btn" href="cv.html">Vitae</a>
                </div>
            </div>
        </div>
    </div>

    <div class="product-container">
        <div class="container-img product">
            <img src="asset/img/coffee.png" id='img-1'>
            <img src="asset/img/tea.png" id='img-2'>
        </div>
        <div class="row container-main product">
            <div class='col-6 p-0 product-title' id="img-1">
                <h2>COFFEE</h2>
                <a href="/product.html" class="btn btn-see">See More</a>
            </div>
            <div class='col-6 p-0 product-title' id="img-2">
                <h2>TEA</h2>
                <a href="/product.html" class="btn btn-see">See More</a>
            </div>
        </div>
    </div>

    <div class="us-container">
        <div class="container-img">
            <img src="asset/img/us.png">
        </div>
        <div class='container-main us fade-in-section'>
            <h1 class="us">RICH RARE RESERVE</h1>
            <p class="us">Our reserve coffees represent the most exclusiveand rich Indonesia coffee regions in the world.</p>
            <a href="#" class="btn kohiso-btn mt-3 us px-3">Learn More</a>
        </div>
    </div>

    <div class="us-container story">
        <div class="container-img">
            <img src="asset/img/story.png">
        </div>
        <div class='container-main us fade-in-section'>
            <h1 class="us">OUR STORY</h1>
            <p class="us">Since 2020 We served people. We’re passionate about delivering the best handcrafted products and take pride in the journey from seed to cup.</p>
            <a href="#" class="btn kohiso-btn mt-3 us px-3">Learn More</a>
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
