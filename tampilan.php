<?php
    session_start();
    error_reporting(0);
    require 'functions.php';
    include "security.php";

    $items = fetchData("SELECT * FROM item");




    // $query = "SELECT * FROM item";
    //
    // $result = mysqli_query($conn,$query);




    // while ($datas = mysqli_fetch_assoc($result)) {
    //   var_dump($datas["name"]);
    // }

    $i = 1

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Tampilan</h1>

    <table border="1" cellpadding = "10" cellspacing = "0" >
      <tr>

        <th>no</th>
        <th>pengaturan</th>
        <th>id</th>
        <th>nama</th>
        <th>harga</th>
        <th>deskripsi</th>
      </tr>
      <?php foreach($items as $item):?>
      <tr>

        <td><?= $i; ?></td>
        <td>
          <a href="gantiitem.php?id=<?= $item['id'] ?>">edit</a>
          <a href="hapusitem.php?id=<?= $item['id'] ?>">hapus</a>
        </td>
        <?= "<td>".$item['id']."</td>" ?>
        <?= "<td>".$item['name']."</td>" ?>
        <?= "<td>".$item['harga']."</td>" ?>
        <?= "<td>".$item['deskripsi']."</td>" ?>

      </tr>
      <?php $i++ ?>


    <?php endforeach; ?>

    </table>

  </body>
</html>
