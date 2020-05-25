  <?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(isset($_SESSION["username"])){

        header("location:products.php");
}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/log_in.css" />
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
          <li><a style="background:#2CBBBB;" href="indexproduk.php">Produk</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a style="background:#2CBBBB;" href="account.php">Edit Akun</a></li>';
            echo '<li><a style="background:#2CBBBB;" href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li class="active"><a style="background:#2CBBBB;" href="login.php">Log In</a></li>';
            echo '<li><a style="background:#2CBBBB;" href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




<div class="kotak_login" style="border-radius: 10px;">
  <h2 class="tulisan_login">LOGIN ACCOUNT</h2>
    <form method="POST" action="verify.php" style="margin-top:30px;">
        <label>Email</label>
        <input type="email" id="right-label" class="form_login" placeholder="tokoamanah@gmail.com" name="username" required>

        <label>Password</label>
        <input type="password" id="right-label" name="pwd" class="form_login" required>

        <input type="submit" id="right-label" value="Login" class="tombol_login">
        <center>
		       <br><a class="link" href="register.php">Register</a>
        </center>
    </form>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
