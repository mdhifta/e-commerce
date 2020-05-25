<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'backend/config.php';

$id = $_GET['id'];
global $link;

$data = $mysqli->query("SELECT product_img_name FROM products WHERE id=".$id);

while($obj = $data->fetch_object()){
    unlink('file/'.$obj->product_img_name);
}

if($action === 'empty')
  unset($_SESSION['hapus']);
  $result = $mysqli->query("DELETE FROM products WHERE id=".$id);

header("location:admin.php");
?>
