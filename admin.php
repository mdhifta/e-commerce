<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'backend/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
	<title>Admin</title>
	<!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!--<link rel="stylesheet" href="css/foundation.css" />-->
    <link rel="stylesheet" href="css/ind_admin.css" />
    <link rel="stylesheet" href="css/foundation.css" />

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/sweet-alert.css">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body class="animsition">

	<div class="page-wrapper">
		<aside class="menu-sidebar2">
			<div class="logo"  style="background-color:white;border:2px;border-style:solid;border-color:white;border-bottom-color:#F9F9F9;">
                <a href="#">
                    <img src="images/logo1.jpg" style="width:500px;height:50px;"alt="LOGO" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120"  style="background-color:#212529;">
                        <img src=" " />
                    </div>
                    <h4 class="name"><?php echo $_SESSION['fname']; ?></h4>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="admininsert.php">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="transaksiadmin.php">
                            <i class="fas fa-shopping-basket"></i>Transaksi</a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="fas fa-edit"></i>Edit Barang</a>
                        </li>
                        <li>
                            <a href="logout.php">
                            <i class="zmdi zmdi-power"></i>Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
		</aside>

		<div class="page-container2">
			<header class="header-desktop2 hd"  style="background-color:#2CBBBB">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                                <div class="header-button-item has-noti js-item-menu">

                                    <div class="notifi-dropdown js-dropdown">

                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>

                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>

                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>

                                        <div class="account-dropdown__item">
                                            <a href="logout.php" id="forLogout">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="img/<?= $auth['foto_user'] ?>" alt="John Doe" />
                        </div>
                        <h4 class="name"><?= $auth['nama_user'] ?></h4>
                        <a href="#">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                        	<li>
                            	<a href="admininsert.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        	</li>
                            <li>
                                <a href="transaksiadmin.php">
                                <i class="fas fa-shopping-basket"></i>Transaksi</a>
                            </li>
                            <li>
                                <a href="logout.php">
                                <i class="fas fa-shopping-basket"></i>Logout</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

    <div class="tabel" style="margin-top:100px;margin-left:440px;width:900px;">
      <table class="table">
          <thead class="thead2">
            <tr>
              <th style="text-align:left;" scope="col">Kode</th>
              <th style="text-align:left;" scope="col">Nama Produk</th>
              <th style="text-align:left;" scope="col">Tentang produck</th>
              <th style="text-align:left;" scope="col">Harga</th>
              <th style="text-align:left;" scope="col">Banyak</th>
            </tr>
          </thead>
          <tbody  style="text-align:center;">
            <?php
              $i=0;
              $product_id = array();
              $product_quantity = array();

              $result = $mysqli->query('SELECT * FROM products order by id asc');
              if($result === FALSE){
                die(mysql_error());
              }

              if($result){
                while($obj = $result->fetch_object()) {
                  echo "<tr'>
                          <td>".$obj->product_code."</td>
                          <td>".$obj->product_name."</td>
                          <td>".$obj->product_desc."</td>
                          <td>".$obj->price."</td>
                          <td><a href='editbarang.php?id=".$obj->id."' class='btn btn-info'>Edit</a>
                          <a href='hapusbarang.php?id=".$obj->id."' class='btn btn-danger'>Hapus</a></td>
                          </tr>";

                  $i++;
                }
              }
              ?>
          </tbody>
          </table>
      </div>
    </div>

<!-- Jquery JS-->
  <script src="vendor/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="vendor/slick/slick.min.js">
  </script>
  <script src="vendor/wow/wow.min.js"></script>
  <script src="vendor/animsition/animsition.min.js"></script>
  <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendor/counter-up/jquery.counterup.min.js">
  </script>
  <script src="vendor/circle-progress/circle-progress.min.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="vendor/select2/select2.min.js">
  </script>
  <script src="vendor/vector-map/jquery.vmap.js"></script>
  <script src="vendor/vector-map/jquery.vmap.min.js"></script>
  <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
  <script src="vendor/vector-map/jquery.vmap.world.js"></script>

  <!-- Main JS-->
  <script src="js/main.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script>
    $(document).ready(function(){
        function preview(input){
          if(input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function (e){
              $('#pict').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }
        $('#gambar').change(function(){
          preview(this);
        })
    });
  </script>
  <script>
    $(document).ready(function(){
        function preview(input){
          if(input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function (e){
              $('#pict2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }
        $('#gambar2').change(function(){
          preview(this);
        })
    });
  </script>
  <script>
    $(document).ready(function(){
      $('#forLogout').click(function(e){
        e.preventDefault();
          swal({
          title: "Logout",
          text: "Yakin Logout?",
          type: "info",
          showCancelButton: true,
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: true
        }, function(isConfirm) {
          if (isConfirm) {
            window.location.href="?logout";
          }
        });
      });



    })
  </script>
  <script>
      $(document).ready(function() {
          $('#example').DataTable();
      } );
  </script>
</body>
</html>
