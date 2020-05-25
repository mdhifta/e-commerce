<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'backend/config.php';

  function tambahdata($product_code, $product_name, $product_desc, $product_img_name, $qty, $price){
    global $link;
    $query = "INSERT INTO products(product_code, product_name, product_desc, product_img_name, qty, price) VALUES ('$product_code', '$product_name', '$product_desc','$product_img_name', '$qty', '$price')";
    $add = mysqli_query($link, $query) or die ("Failed To Add Data");
    return $add;
  }

  function dataoutput(){
    global $link;
    $query = "SELECT * FROM products";
    $data = mysqli_query($link, $query) or die ("Data Falied to Output");
    return $data;
  }

  function tambahadmin($nama, $username, $password){
    global $link;
    $query = "INSERT INTO admin(nama, username, password) VALUES ('$nama','$username','$password')";
    $add = mysqli_query($link, $query) or die ("Failed To Add Data");
    return $add;
  }

  function editdata($temp_selection, $id){
    global $link;
    $query = "UPDATE pembayaran SET status='$temp_selection' WHERE id='$id'";
    $add = mysqli_query($link, $query) or die ("Failed To Add Data");
    return $add;
  }

  function hapusdata($id){
    global $link;
    $query = "DELETE FROM pembayaran WHERE id='$id";
    $add = mysqli_query($link, $query) or die ("Failed To Add Data");
    return $add;
  }
?>
