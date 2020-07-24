<?php
if(!isset($_SESSION['data_admin'])){
        header('location:logoutadmin.php');
}
else{
    $akun=$_SESSION['data_admin'];
    $admin=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM admin where username='$akun'"));
    }
?>