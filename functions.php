<?php

date_default_timezone_set('Asia/Jakarta');
$conn = mysqli_connect("localhost","root","","kohiso");
$hostname="http://localhost/kohiso-web2/";

  function addItem($data){

    global $conn;
    $name = $data["name"];
    $deskripsi = $data["deskripsi"];
    $harga = $data["harga"];

    $query = "INSERT INTO item
    VALUES (
     '',  '$name' , '$deskripsi' , '$harga'
    ) ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
  }

  function fetchData($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $datas = [];
    while ($data = mysqli_fetch_assoc($result)) {
      $datas[] = $data;
    }
    return $datas;
  }

  function deleteData($data){
   global $conn;
   mysqli_query($conn,"DELETE FROM item WHERE id = '$data'");
   return mysqli_affected_rows($conn);
 }

 function deleteAdmin($data){
   global $conn ;
   mysqli_query($conn,"DELETE FROM admin WHERE id = '$data'");
   return mysqli_affected_rows($conn);
 }

 function deleteItemCart($data){
   global $conn ;
   mysqli_query($conn,"DELETE FROM cart WHERE id = '$data'");
   return mysqli_affected_rows($conn);
 }

  function updateData($data){
    global $conn;
    $id = $data["id"];
    $name = $data["name"];
    $deskripsi = $data["deskripsi"];
    $harga = $data["harga"];

    $query = "UPDATE item SET
      name ='$name' ,
      deskripsi = '$deskripsi' ,
      harga = '$harga'
      WHERE id = $id";


    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
  }

  function editAdmin($data){
    global $conn;
    $id = $data["id"];
    $username = $data["username"];
    $password = $data["password"];

    $query = "UPDATE admin SET
      username ='$username' ,
      password = '$password'
      WHERE id = $id";

      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);


  }

  function addAccount($data){

    global $conn;
    $firstName = $data["firstName"];
    $lastName = $data["lastName"];
    $phoneNum = $data["phoneNum"];
    $gender = $data["gender"];
    $username = $data["username"];
    $address = $data["address"];
    $password = $data["password"];


    $query = "INSERT INTO account
    VALUES (
     '',  '$firstName' , '$lastName' , '$phoneNum' , '$gender' , '$username' , '$address' , '$password'
    ) ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
  }

  function addAdmin($data){
    global $conn ;

    $username = $data["username"];
    $password = $data["password"];

    $query = "INSERT INTO admin
    VALUES(
      '', '$username' , '$password'
    )";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);


  }

  function addCart($data,$data2){
    global $conn ;

    $username = $data2;
    $name = $data["$name"];
    $harga = $data["$harga"];

    $query = "INSERT INTO cart
    VALUES(
      '', '$username' , '$nama' , '$harga'
    )";

    mysqli_query($conn,$query);
    return mysql_affected_rows($conn);

  }


  function checkout($data){
    global $conn;
    $status = "pending";
    $username = $data["username"];
    $nama = $data["itemName"];
    $price = $data["itemPrice"];

    $query = "INSERT INTO checkout VALUES(
      '', '$username' , '$nama' , '$price' , '$status'
    )";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
  }

  function clearCart($data){
    global $conn ;

    mysqli_query($conn,"DELETE FROM cart WHERE username = '$data'");


  }

 ?>
