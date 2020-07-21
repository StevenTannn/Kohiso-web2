<?php

  $conn = mysqli_connect("localhost","root","","kohiso");


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

  function gantiAdmin($data){
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


 ?>
