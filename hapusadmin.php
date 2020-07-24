<?php
session_start();
    error_reporting(0);
    require 'functions.php';
    include "security.php";
$name = $_GET["id"];

if(deleteAdmin($name) > 0 ){
  echo "
    <script>
    alert('data berhasil dihapus');
    document,location.href = 'adminuser.php';
    </script>
  ";
}
?>
