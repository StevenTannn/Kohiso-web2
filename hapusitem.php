<?php

  require 'functions.php';
  $name = $_GET["id"];

  if(deleteData($name) > 0 ){
    echo "
      <script>
      alert('data berhasil dihapus');
      document,location.href = 'tampilan.php';
      </script>
    ";
  }

 ?>
