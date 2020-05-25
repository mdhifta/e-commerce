<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'backend/config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemesanan</title>
    <link rel="stylesheet" href="css/foundation.css"/>
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation" style="background:#2CBBBB;">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Toko Amanah</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a style="background:#2CBBBB;" href="products.php">Produk</a></li>
          <li><a style="background:#2CBBBB;" href="cart.php">Keranjang</a></li>
          <li class="active"><a style="background:#2CBBBB;" href="orders.php">Pesanan</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a style="background:#2CBBBB;" href="account.php">Edit Akun</a></li>';
            echo '<li><a style="background:#2CBBBB;" href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a style="background:#2CBBBB;" href="login.php">Log In</a></li>';
            echo '<li><a style="background:#2CBBBB;" href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>Pembayaran</h3>
        <hr>

        <?php
          $user = $_SESSION["username"];
          $result = $mysqli->query("SELECT * from pembayaran where user='".$user."'");
          if($result) {
            while($obj = $result->fetch_object()) {
              //echo '<div class="large-6">';
              echo '<p><h4>Order ID -> BB4'.$obj->id.'TR</h4></p>';
              echo '<p><strong>Tanggal Pesan</strong>: '.$obj->date.'</p>';
              echo '<p><strong>Kode Barang</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Nama Barang</strong>: '.$obj->product_name.'</p>';
              echo '<p><strong>Banyak Barang</strong>: '.$obj->units.'</p>';
              echo '<p><strong>Total Harga</strong>: '.$currency.$obj->total.'</p>';
              if($obj->status == "Telah dikonfirmasi"){
                echo '<p style="color:#2CBBBB;"><strong style="color:black;">Status Penerimaan:</strong> '.$obj->status.'</p>';
              } else {
                echo '<p style="color:red;"><strong style="color:black;">Status Penerimaan:</strong> '.$obj->status.'</p>';
              }
              //echo '</div>';
              //echo '<div class="large-6">';
              //echo '<img src="images/products/sports_band.jpg">';
              //echo '</div>';
              echo '<p><hr></p>';
            }
          }
        ?>
      </div>
    </div>




    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; Toko Amanah - 2020</p>
        </footer>

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
