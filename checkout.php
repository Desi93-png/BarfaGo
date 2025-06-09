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

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="css/style5.css">
</head>

<body>
  <nav class="navbar">
    <a href="#" class="navbar-brand"><img src="img/logo_barfa.png" alt="logo" width="130" height="80" /></a>
    <div class="navbar-nav">
      <a href="home.php">Beranda</a>
      <a href="history.php">History</a>
      <a href="about.php">About Us</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>
    <div class="navbar-extra">
      <a href="keranjang.php" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
  </nav>

  <section class="page-keranjang">
    <div class="container">
      <div class="judul">
        <h2>Checkout</h2>
        <p>Address Details</p>
      </div>

      <div class="breadcrumb-a">
        <div class="card-body">
          <h2>Ringkasan Pesanan</h2>
          <table>
            <tr>
              <td>Subtotal Produk</td>
              <td style="padding-left: 2rem;">Rp<?php echo number_format($total_harga, 0, ',', '.'); ?></td>
            </tr>
            <tr>
              <td>Ongkos Kirim</td>
              <td style="padding-left: 2rem;">Rp<?php echo number_format($ongkir, 0, ',', '.'); ?></td>
            </tr>
            <tr>
              <th style="padding-top: 1.5rem; text-align: left">Total</th>
              <th style="padding-top: 1.5rem; padding-left:2rem">Rp<?php echo number_format($total_harga + $ongkir, 0, ',', '.'); ?></th>
            </tr>
          </table>
        </div>
      </div>

      <div class="container">
        <div class="breadcrumb">
          <div class="card-body">
            <form id="checkout-form" method="POST" action="prosesinput.php" enctype="multipart/form-data">
              <label for="nama">Nama lengkap</label><br>
              <input required type="text" id="nama" name="nama"><br><br>
              
              <label for="email">Email</label><br>
              <input required type="email" id="email" name="email"><br><br>

              <label for="no_hp">Nomor HP</label><br>
              <input required type="text" id="no_hp" name="no_hp"><br><br>

              <label for="alamat">Detail Alamat</label><br>
              <input required type="text" id="alamat" name="alamat"><br><br>

              <label for="link">Link Alamat Google Maps</label><br>
              <input required type="text" id="link" name="link"><br><br>

              <p>Pilih Metode Pembayaran:</p>
              <label><input type="radio" name="metode_bayar" value="Cash"> Bayar di Tempat (Cash)</label><br>
              <label><input type="radio" name="metode_bayar" value="E-Money"> E-Money</label><br><br>
              
              <div id="bukti-bayar-container" style="display: none;">
                <label for="bukti_bayar">Bukti Pembayaran</label><br>
                <input type="file" id="bukti_bayar" name="bukti_bayar"><br><br>
              </div>

              <input type="submit" value="Kirim"> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const radioButtons = document.getElementsByName('metode_bayar');
    const buktiBayarContainer = document.getElementById('bukti-bayar-container');
    const buktiBayarInput = document.getElementById('bukti_bayar');

    radioButtons.forEach(function (radio) {
      radio.addEventListener('change', function () {
        if (this.value === 'e-money') {
          buktiBayarContainer.style.display = 'block';
          buktiBayarInput.setAttribute('required', 'required');
        } else {
          buktiBayarContainer.style.display = 'none';
          buktiBayarInput.removeAttribute('required');
        }
      });
    });
  });
  </script>

  <script>
    feather.replace()
  </script>
</body>
</html>
