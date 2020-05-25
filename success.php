<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Keranjang Belanjaan</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/test.css" />
    <link rel="stylesheet" href="css/foot_class.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
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
      <li class="active"><a style="background:#2CBBBB;" href="cart.php">Keranjang</a></li>
      <li><a style="background:#2CBBBB;" href="orders.php">Pesanan</a></li>
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
      <div class="small-12">
        <p>Succes, data berhasil dikirim. Silakan tunggu konfirmasi, dipesanan anda!</p>
        <p>Terimakasih sudah belanja.</p>

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
