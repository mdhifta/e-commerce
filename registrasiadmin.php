<?php
  require_once('backend/init.php');

  if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

  if(tambahadmin($nama, $username, $password)){
        echo '<script href=\"products.php\">alert("SUCCES ADD YOUR PRODUCT!");</script>';
      }
		}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>registrasi admin</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <h1 align="center">REGISTRASI ADMIN</h1><br>

   <div class="inputdata">
     <form method="POST" action="" enctype="multipart/form-data">
       <div class="row">
       <div class="small-3 columns">
         <label for="right-label" class="right inline">Nama</label>
       </div>
       <div class="small-8 columns end">
         <input type="text" id="right-label" placeholder="Nama" name="nama">
       </div>
       </div>

       <div class="row">
       <div class="small-3 columns">
         <label for="right-label" class="right inline">Username</label>
       </div>
       <div class="small-8 columns end">
         <input type="text" id="right-label" placeholder="Username" name="username">
       </div>
       </div>

       <div class="row">
       <div class="small-3 columns">
         <label for="right-label" class="right inline">password</label>
       </div>
       <div class="small-8 columns end">
         <input type="password" id="right-label" placeholder="password" name="password">
       </div>
       </div>

       <button style="margin-left:35%;" name="submit" class="uplod">Tambah Admin</button>
   </form>
   </div>

</body>
</html>
