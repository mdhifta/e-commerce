<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'backend/config.php';

$id = $_GET['id'];
global $link;
$data = $mysqli->query("SELECT bukti_bayar FROM pembayaran WHERE id=".$id);

while($obj = $data->fetch_object()){
    unlink('bukti_transfer/'.$obj->bukti_bayar);
}

if($action === 'empty')
  unset($_SESSION['hapus']);
  $result = $mysqli->query("DELETE FROM pembayaran WHERE id=".$id);

header("location:transaksiadmin.php");

?>
