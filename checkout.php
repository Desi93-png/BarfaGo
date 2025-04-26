<?php
  session_start();
  $username = $_SESSION['username'];
  if (empty($_SESSION['username'])) {
      header("location:login.php?pesan=belum_login");
  }

  include 'koneksi.php';

  $total_harga = 0;
  $ongkir = 2000;
  foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah) {
      $ambil = $connect->query("SELECT * FROM product WHERE id_produk = '$id_produk'");
      $pecah = $ambil->fetch_assoc();
      $subtotal = $pecah['harga'] * $jumlah;
      $total_harga += $subtotal;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kopi Kenangan Senja</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- My Style -->
  <link rel="stylesheet" href="css/style5.css">

   <script src="src/app.js"></script>
</head>

<body>

  <!-- Navbar start -->
  <nav class="navbar">
    
    <a class="navbar-brand" href="#">
        <img src="img/logo_barfa.png" alt="logo" width="130" height="80" />
    </a>

    <div class="navbar-nav">
      <a href="home.php">Beranda</a>
      <a href="#about">History</a>
      <a href="#menu">Kupon</a>
      <a href="about.php">About Us</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <div class="navbar-extra">
      <!-- <a href="#" id="search-button"><i data-feather="search"></i></a> -->
      <a href="keranjang.php" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- Search Form start -->
    <div class="search-form">
      <input type="search" id="search-box" placeholder="search here...">
      <label for="search-box"><i data-feather="search"></i></label>
    </div>
    <!-- Search Form end -->


  </nav>
  <!-- Navbar end -->

  <section class="page-keranjang">
    <div class="container">

    <div class="judul">
        <h2>Checkout</h2>
        <p>Address Details</p>
    </div>

    <div class="breadcrumb-a">
        <div class="card-body">
            <h2>Ringkasan Pesanan</h2>
            <br>

            <table>
                <tr>
                    <td>Subtotal Produk</td>
                    <td style="padding-left: 2rem;">Rp<?php echo number_format($total_harga, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>Ongkos Kirim</td>
                    <td  style="padding-left: 2rem;">Rp<?php echo number_format($ongkir, 0, ',', '.'); ?></td>
                </tr>
                
                <tr>
                    <?php
                        $total = $total_harga + $ongkir;
                    ?>
                    <th style="padding-top: 1.5rem; text-align: left">Total</th>
                    <th style="padding-top: 1.5rem; padding-left:2rem">Rp<?php echo number_format($total, 0, ',', '.'); ?></th>
                </tr>
            </table>
            <!-- <p>Subtotal Produk: Rp<?php echo number_format($total_harga, 0, ',', '.'); ?></p>
            <p>Ongkos Kirim: Rp<?php echo number_format($ongkir, 0, ',', '.'); ?></p>
            <br>
            <?php
                $total = $total_harga + $ongkir;
            ?>
            <h4>Total: Rp<?php echo number_format($total, 0, ',', '.'); ?></h4> -->
        </div>
    </div>

    <div class="container">
        <div class="breadcrumb">
            <div class="card-body">
                <form action="prosesinput.php" method="POST">
                    <label style="margin-top: 1rem"; for="nama">Nama lengkap</label><br>
                    <input required type="text" id="nama" name="nama"><br><br>

                    <label for="email">Email</label><br>
                    <input required type="email" id="email" name="email"><br><br>

                    <label for="no_hp">Nomor HP</label><br>
                    <input required type="no_hp" id="no_hp" name="no_hp"><br><br>

                    <label for="alamat">Detail Alamat</label><br>
                    <input required type="alamat" id="alamat" name="alamat"><br><br>

                    <label for="link">Link Alamat Google Maps</label><br>
                    <input required type="link" id="link" name="link"><br><br>

                    <input type="submit" value="Kirim">
                </form>

            </div>

        </div>

    </div>
  </section>

  <!-- Feather Icons -->
  <script>
    feather.replace()
  </script>


</body>

</html>
