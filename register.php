<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if (isset($_SESSION["username"])) {header ("location:index.php");}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="css/foundation.css" />
      <link rel="stylesheet" href="css/reg_st.css" />
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
          <!-- -->
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a style="background:#2CBBBB;" href="account.php">My Account</a></li>';
            echo '<li><a style="background:#2CBBBB;" href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a style="background:#2CBBBB;" href="login.php">Log In</a></li>';
            echo '<li class="active"><a style="background:#2CBBBB;" href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




<div class="kotak_back">
  <h2 class="text">Register</h2>
    <form method="POST" action="insert.php" style="margin-top:30px;margin-left:100px;">
      <div class="row">
        <div class="small-8">

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Nama depan</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Nama depan" name="fname" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Nama belakang</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Nama Belakang" name="lname" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Alamat</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Alamat" name="address" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Kota</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Kota" name="city" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Kode POS</label>
            </div>
            <div class="small-8 columns">
              <input type="number" id="right-label" placeholder="Kode POS (400056)" name="pin" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">E-mail</label>
            </div>
            <div class="small-8 columns">
              <input type="email" id="right-label" placeholder="tokoamanah@gmail.com" name="email" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Password</label>
            </div>
            <div class="small-8 columns">
              <input type="password" id="right-label" name="pwd" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Register" style="background: #2CBBBB; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: red; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>
</div>




    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
