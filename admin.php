<?php
error_reporting(0);
session_start();
include 'functions.php';
if(isset($_SESSION["data_admin"]))
{
 header("location:adminhome.php");
}

 $user = mysqli_real_escape_string($conn, $_POST['username']);
 $pass = mysqli_real_escape_string($conn, $_POST['password']);

  if(isset($_POST['login'])){
    if($user == ""){
    $er_email="<div class='alert alert-warning alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button>
    <strong>Username Kosong !</strong> <br> Username wajib diisi</div>";
    }
    elseif($pass == ""){
    $er_pass="<div class='alert alert-warning alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button>
    <strong>Password Kosong !</strong> <br> Password Wajib diisi</div>";
    }
    else{
    $sql_cek=mysqli_query($conn, "SELECT * FROM admin where username='$user' and password='$pass'");
    $cek_admin=mysqli_num_rows($sql_cek);
    if($cek_admin == "0"){
    $er_email="<div class='alert alert-danger alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button><strong>Login Gagal !</strong> <br>Username dan Password tidak valid</div>";
    }
    else{
    $_SESSION['data_admin']=$user;
    echo "<script>alert('Selamat Datang di Halaman Admin !');document.location='adminhome.php'</script>";

     }
   }
 }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <body class="bodylogin">
      <div class="container"> <!-- start container -->
           <div class="row"><!-- start row -->
                <div class="col-lg-12"><!-- start col lg 12-->
                    <div class="login rounded"><!-- start class login -->
                      <h3>LOGIN ADMIN WEB KOHISO</h3>
                      <!-- start form login -->
                      <form action="" method="post">
                        <div class="form-group row"><!--start form-group-->
                            <label class="col-lg-3">Username</label>
                            <div class="col-lg-8 input-group input-group-sm">
                              <span class="input-group-addon px-2"><i class="fa fa-user fa-fw"></i></span>
                              <input type="text" name="username" placeholder="username" class="input-admin form-control " maxlength="40" value="<?php echo $_POST['username'];?>" autofocus>
                            </div>
                        </div><!--/form-group-->

                        <?php echo $er_email;?>
                        <div class="form-group row"><!--start form-group-->
                            <label class="col-lg-3">Password</label>
                            <div class="col-lg-8 input-group  input-group-sm">
                              <span class="input-group-addon px-2"><i class="fa fa-lock fa-fw"></i></span>
                              <input id="pass1" type="password" name="password" placeholder="password" class="form-control input-admin" value="<?php echo $_POST['password'];?>" maxlength="15">
                            </div>
                        </div><!--/form-group-->
                        <?php echo $er_pass;?>

                        <div class="text-center"><button class="btn kohiso-btn  w-50" type="submit" name="login">Log In</button></div>

                      </form>
                       <!-- end form login -->
  		              </div><!-- end class login --> 
              </div><!-- end col lg 12 -->
          </div><!-- end row -->
      </div><!-- end container -->
    </body>
</html>