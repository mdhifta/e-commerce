<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toko Amanah</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/styleindex.css" />
    <link rel="stylesheet" href="css/foot_class.css"/>
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation" style="background:#2CBBBB;" >
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Toko Amanah</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a style="background:#2CBBBB;" href="indexproduk.php">Produk</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a  style="background:#2CBBBB;" href="account.php">Edit Akun</a></li>';
            echo '<li><a  style="background:#2CBBBB;" href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a  style="background:#2CBBBB;" href="login.php">Log In</a></li>';
            echo '<li><a  style="background:#2CBBBB;" href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>

<div class="slideshow" id="slider-utama">
	<div class="slider-wrapper">
		<img src="images/3.jpg" class="slide" />
		<img src="images/4.jpg" class="slide" />
    <img src="images/5.jpg" class="slide" />
    <img src="images/6.jpg" class="slide" />
    <img src="images/7.jpg" class="slide" />
    <img src="images/8.jpg" class="slide" />
    <img src="images/9.jpg" class="slide" />
    <img src="images/10.jpg" class="slide" />
    <img src="images/11.jpg" class="slide" />
    <img src="images/12.jpg" class="slide" />
    <img src="images/13.jpg" class="slide" />
    <img src="images/14.jpg" class="slide" />
	</div>
</div>


<footer>
   <div class="footerclas" style="margin-top:120px;">
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
    <script src="js/toindex.js"></script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
