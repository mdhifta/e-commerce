<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'backend/config.php';

// if($_SESSION["type"]!="admin") {
//   header("location:admininsert.php");
// }

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
      <div class="large-12">
        <?php

          echo '<p><h3>Keranjang Belanja</h3></p>';

          if(isset($_SESSION['cart'])) {
            $total = 0;
            echo '<table>';
            echo '<tr>';
            echo '<th>Kode</th>';
            echo '<th>Name</th>';
            echo '<th>Banyak</th>';
            echo '<th>Harga</th>';
            echo '</tr>';
            foreach($_SESSION['cart'] as $product_id => $quantity) {

            $result = $mysqli->query("SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = ".$product_id);


            if($result){
              while($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity; //work out the line cost
                $total = $total + $cost; //add to the total cost

                echo '<tr>';
                echo '<td>'.$obj->product_code.'</td>';
                echo '<td>'.$obj->product_name.'</td>';
                echo '<td>'.$quantity.'&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id='.$product_id.'">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id='.$product_id.'">-</a></td>';
                echo '<td>'.$cost.'</td>';
                echo '</tr>';
              }
            }
          }

          echo '<tr>';
          echo '<td colspan="3" align="right">Total</td>';
          echo '<td>'.$total.'</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Batal Belanja</a>&nbsp;<a href="products.php" class="button [secondary success alert]">Belanja Lagi</a>';
          if(isset($_SESSION['username'])) {
          //echo '<a id="button" class="btn btn-primary" href="orders-update.php"><button style="float:right;">Bayar</button></a>';
            echo '<button id="button" class="btn btn-primary" style="float:right;">Bayar</button>';
          } else {
            echo '<a href="login.php"><button style="float:right;">Login</button></a>';
          }

          echo '</td>';
          echo '</tr>';
          echo '</table>';
        }

        else {
          echo "Anda harus memilih salah satu produk!";
        }

          echo '</div>';
          echo '</div>';
      ?>

<?php
    require_once('orders-update.php');

      if(isset($_POST['submit'])){
        $alamat = $_POST['alamat'];
        $product_img_name = $_FILES['file']['name'];

        $ekstensi_diperbolehkan	= array('png','jpg');
        $x = explode('.', $product_img_name);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 3044070){
              move_uploaded_file($file_tmp, 'bukti_transfer/'.$product_img_name);
              if(transfer($product_img_name, $alamat)){
                // go to add data
          }
        }
      }
    }
  ?>

        <div class="bg-modal">
            <div class="modal-content1">
              <div class="close" style="color:#007095;">+</div>
                  <h3 style="font-family:serif;color:#007095;margin-top:3%;">Silakan lengkapi data dibawah ini</h3>
                  <p>Pembayaran dilakukan dengan cara mentransfer kepada bank BNI : 081726662277 A/N Toko Amanah <br>
                  lalu mengirim bukti transfer dan alamat yang di tuju dibawah ini: </p>
                  <form method="post"  enctype="multipart/form-data">
                    <label>Bukti transfer</label>
                    <input type="file" id="right-label" name="file">
                    <label>Alamat: </label>
                    <textarea name="alamat" rows="8" cols="80"></textarea>
                    <button name="submit" style="float:right;">Bayar</button>
                  </form>
            </div>
          </div>



          <footer style="margin-top:450px;">
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




    <script src="js/loadjs.js" type="text/javascript"></script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
