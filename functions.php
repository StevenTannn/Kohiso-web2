<?php

date_default_timezone_set('Asia/Jakarta');
$conn = mysqli_connect("localhost","root","","kohiso");
$hostname="http://localhost/kohiso-web2/";

  function addItem($data,$imageUploaded, $imageType){

    global $conn;
    $name = $data["name"];
    $deskripsi = $data["deskripsi"];
    $harga = $data["harga"];
    $img_type = $imageType;

    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($imageUploaded));
    $image = 'data:image/'.$img_type.';base64,'.$image_base64;

    $query = "INSERT INTO item
    VALUES (
     DEFAULT,  '$name' , '$deskripsi' , '$harga', '$image', '$img_type'
    ) ";

    mysqli_query($conn,$query);
    $affected_rows = mysqli_affected_rows($conn);

    $insert_id = mysqli_insert_id($conn);
    $target_dir = "asset/img/prd-img/";
    $target_file = $target_dir . $insert_id;

    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    return $affected_rows;
    
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

  function updateData($data, $imageUploaded, $imageType){
    global $conn;
    $id = $data["id"];
    $name = $data["name"];
    $deskripsi = $data["deskripsi"];
    $harga = $data["harga"];

    $img_type = $imageType;

    // Convert to base64
    $image_base64 = base64_encode(file_get_contents($imageUploaded));
    $image = 'data:image/'.$img_type.';base64,'.$image_base64;

    $query = "UPDATE item SET
      name ='$name' ,
      deskripsi = '$deskripsi' ,
      harga = '$harga' ,
      image = '".$image."' ,
      img_type = '$img_type'
      WHERE id = $id";


    mysqli_query($conn,$query);
    $affected_rows = mysqli_affected_rows($conn);

    $target_dir = "asset/img/prd-img/";
    $target_file = $target_dir . $id;

    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    return $affected_rows;
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
     DEFAULT,  '$firstName' , '$lastName' , '$phoneNum' , '$gender' , '$username' , '$address' , '$password'
    ) ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
  }

  function addAdmin($data){
    global $conn ;

    $username = $data["username"];
    $password = $data["password"];

    $query = "INSERT INTO admin VALUES (
      DEFAULT, '$username' , '$password'
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
      DEFAULT, '$username' , '$nama' , '$harga'
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
      DEFAULT, '$username' , '$nama' , '$price' , '$status'
    )";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
  }

  function clearCart($data){
    global $conn ;

    mysqli_query($conn,"DELETE FROM cart WHERE username = '$data'");

  }

  function hapusCheckout($data){
    global $conn ;
    $query = "DELETE FROM checkout WHERE id = '$data'";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
  }

  function kirim($data){
    global $conn;
    $id = $data["id"];
    $username = $data["username"];
    $nama = $data["nama"];
    $harga = $data["harga"];
    $status = $data["status"];
    $query = "UPDATE checkout SET
      username ='$username' ,
      nama = '$nama' ,
      harga = '$harga',
      status = 'sent'
      WHERE id = $id ";

      mysqli_query($conn,$query);

      mysqli_affected_rows($conn);

  }

  function batal($data){
    global $conn;
    $id = $data["id"];
    $username = $data["username"];
    $nama = $data["nama"];
    $harga = $data["harga"];
    $status = $data["status"];
    $query = "UPDATE checkout SET
      username ='$username' ,
      nama = '$nama' ,
      harga = '$harga',
      status = 'denied'
      WHERE id = $id ";

      mysqli_query($conn,$query);

      mysqli_affected_rows($conn);

  }


  function show_img($id){
      $target_dir = "asset/img/prd-img/";
      return $target_dir . $id . "?t=" . time();
  }


  function editUser($data){
    global $conn;
    $id = $data["id"];
    $firstName = $data["FirstName"];
    $lastName = $data["LastName"];
    $phoneNum = $data["PhoneNum"];
    $gender = $data["Gender"];
    $username = $data["Username"];
    $address = $data["Address"];
    $password = $data["Password"];

    $query = "UPDATE account SET
      id = '$id',
      FirstName ='$firstName' ,
      LastName ='$lastName' ,
      PhoneNum = '$phoneNum',
      Gender = '$gender' ,
      Username ='$username' ,
      Address ='$address' ,
      password = '$password'
      WHERE id = $id";

      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);


  }

  function deleteAccount($data){
    global $conn ;
    $id = $data["id"];
    mysqli_query($conn,"DELETE FROM account WHERE id = '$id'");
    return mysqli_affected_rows($conn);
  }
 ?>
