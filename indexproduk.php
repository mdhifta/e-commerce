<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'backend/config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barang</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/foot_class.css" />
    <link rel="stylesheet" href="css/product_desc.css" />
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
          <li class='active'><a style="background:#2CBBBB;" href="products.php">Produk</a></li>
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
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $mysqli->query('SELECT * FROM products');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<h3></h3>';
              echo '<img src="file/'.$obj->product_img_name.'"/><br>';
              echo '<p"><strong>Kode</strong>: '.$obj->product_code.'</p>';
              echo '<p>'.$obj->product_name.'</p>';
              #echo '<p><strong>Deskripsi</strong>: '.$obj->product_desc.'</p>';
              #echo '<p><strong>Banyak Unit</strong>: '.$obj->qty.'</p>';
              echo '<p>'.$currency.$obj->price.'</p>';

              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Tambah Ke Keranjang" style="clear:both;border:none;border-radius:5px;background:#2CBBBB;border:none;color:#fff;font-size:1em;padding:10px;margin-left:1px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>


        <footer>
           <div class="footerclas">
             <div class="about">
               <br>
               <h4>Toko Amanah</h4>
               <img src="images/loc.png" class="gmbrig">
               <p>Jl. Magelang No.12, Kutu Patran, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284</p>
               <img src="https://www.transparentpng.com/thumb/logo-instagram/z75gfy-instagram-logo-png.png" class="gmbrig">
               <a href="https://instagram.com/amanah.gallerymuslim?igshid=1lrwoi4756zz5">amanah.gallerymuslim</a><br>
               <img src="https://www.transparentpng.com/thumb/whatsapp/zffspR-whatsapp-transparent-picture.png" class="gmbrig">
               <p class="no">+62 821-3795-0100</p>
             </div>
           </div>
        </footer>




    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
