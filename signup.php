<?php
  require 'functions.php';
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

            <div class="head-title">
                <h1>EGIFT CARDS</h1>
            </div>

        </div>
    </div>

    <div class="egift-container">
        <div class="egift-pat">

        </div>

        <div class="container egift">
            <h1 class="text-center">Give The Perfect Gift</h1>
            <h3 class="text-center mb-3">Send gift instantly and choose amount</h3>
            <div id="carouselExampleSlidesOnly mb-5" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="asset/img/about%20(1).png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="asset/img/about%20(2).png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="asset/img/about%20(3).png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <form class="egift" method="post">
            	<div class="row">
            		<div class="col-3"> </div>
	                <div class="col-6">
	                	<div class="row">
	                		<div class="col">
	                			<label>FIRST NAME</label>
	                    		<input class="form-control" name="firstName" required>
	                		</div>
	                		<div class="col">
	                			<label>LAST NAME</label>
	                    		<input class="form-control" name="lastName" required>
	                		</div>
	                	</div>
	                	<br>
	                	<div class="row">
	                		<div class="col">
	                			<label>PHONE NUMBER</label>
	                    		<input class="form-control" name="phoneNum" required>
	                		</div>
	                		<div class="col">
	                			<label>GENDER</label>
	                   			<select class="form-control" name="gender">
          								    <option>Male</option>
          								    <option>Female</option>
          								    <option>Custom</option>
          								</select>
	                		</div>
	                	</div>
	                	<br>
	                    <label>USERNAME/EMAIL</label>
	                    <input class="form-control" type="email" name="username" required>
	                    <br>
	                    <label>ADDRESS</label>
	                    <input class="form-control" name="address" required>
	                    <br>
	                    <div class="row">
	                		<div class="col">
	                			<label>PASSWORD</label>
	                    		<input type="password" class="form-control" name="password" required>
	                		</div>
	                		<div class="col">
	                			<label>CONFIRM PASSWORD</label>
	                   			<input type="password" class="form-control" name="cpassword" required>
	                		</div>
	                	</div>

	                    <br>

	                </div>
	                <div class="col-3"> </div>
            	</div>
            	<br>
                <div class="w-100 text-center"><button class="btn kohiso-btn egi-btn" type="submit" name="submit">SIGN UP</button></div>
            </form>
            <?php
            if(isset($_POST["submit"])){
              if ($_POST["password"] == $_POST["cpassword"]) {
                if (addAccount($_POST)>0) {
                  echo "berhasil";
                }else {
                  echo "gagal";
                }
              }else {
                echo "password tidak sesuai";
              }
            }


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
