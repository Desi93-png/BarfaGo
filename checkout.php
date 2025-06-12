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
  <title>Barfa Guna Sejahtera</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <!-- <link rel="stylesheet" href="css/style5.css"> -->
   <!-- My Style -->
    <style>
      :root {
        --primary: #39BEF9;
        --bg: #cdf0f7;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
      }

      html {
        scroll-behavior: smooth;
      }

      body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--bg);
        color: #fff;
      }


      /* Navbar */
      .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.4rem 7%;
        background-color: rgba(199, 233, 245, 0.8);
        border-bottom: 0.5px solid #2a709e;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999;
      }

      .navbar .navbar-logo {
        font-size: 2rem;
        font-weight: 700;
        color: #fff;
        font-style: italic;
      }

      .navbar .navbar-logo span {
        color: var(--primary);
      }

      .navbar .navbar-nav a {
        color: #00589A;
        display: inline-block;
        font-size: 1.3rem;
        font-weight: 510;
        margin: 0 1rem;
      }

      .navbar .navbar-nav a:hover {
        color: var(--primary);
      }

      .navbar .navbar-nav a::after {
        content: '';
        display: block;
        padding-bottom: 0.5rem;
        border-bottom: 0.1rem solid var(--primary);
        transform: scaleX(0);
        transition: 0.2s linear;
      }

      .navbar .navbar-nav a:hover::after {
        transform: scaleX(0.5);
      }

      .navbar .navbar-extra a {
        color: #00589A;
        margin: 0 0.5rem;
      }

      .navbar .navbar-extra a:hover {
        color: var(--primary);
      }

      /* Shopping Cart */
      .shopping-cart {
        position: absolute;
        top: 100%;
        right: -100%;
        height: 100vh;
        width: 35rem;
        padding: 0 1.5rem;
        background-color: #00589A;
        color: var(--bg);
        transition: 0.3s;
      }

      .shopping-cart.active {
        right: 0;
      }

      .shopping-cart .cart-item {
        margin: 2rem 0;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px dashed #666;
        position: relative;
      }

      .shopping-cart img {
        height: 6rem;
        border-radius: 50%;
      }

      .shopping-cart h3 {
        font-size: 1.6rem;
        padding-bottom: 0.5rem;
      }

      .shopping-cart .item-price {
        font-size: 1.2rem;
      }

      .shopping-cart .remove-item {
        position: absolute;
        right: 1rem;
        cursor: pointer;
      }

      .shopping-cart .remove-item:hover {
        color: var(--primary);
      }

      .page-keranjang{
        margin: 2rem 0;
        margin-top: 10rem;
        padding: 1.4rem 7%;
      }

      .breadcrumb {
        padding: 15px 30px;
        margin-bottom: 20px;
        background-color: #003964;
        border-radius: 10px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, .5);
        max-width: 100%;
        width: 100%;
        box-sizing: border-box;
        margin-left: auto;
        margin-right: auto;
      }

      .breadcrumb-a { 
        padding: 15px 30px;
        margin-bottom: 20px;
        background-color: #003964;
        border-radius: 10px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, .5);
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        max-width: 400px; /* atau 500px, sesuai kebutuhan */
        box-sizing: border-box;
      }

      .judul{
        text-align: center;
      }

      .judul h2{
        font-size: 3rem;
        font-weight: bolder;
        color: #003964;
        padding: 0px 6%;
      }

      .judul p{
        font-size: 1.33rem;
        font-weight: bolder;
        color: #003964;
        padding: 0px 6%;
        margin-bottom: 3rem;
      }

      .card-body{
        color: #fff;
        padding: 20px;
        border-radius: 15px;
        color: white;
        max-width: 100%;
        overflow-wrap: break-word;
        box-sizing: border-box;
      }

      .card-body table {
        width: 100%;
        table-layout: fixed; /* Membatasi lebar kolom */
      }



      .card-header {
        padding: 20px;
        border-radius: 0 0 10px 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        margin-top: 2.5rem;
      }

      .card-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .btn-kembali, .btn-checkout{
        padding: 10px 18px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.3s ease;
      }

      .form-group {
        margin-bottom: 1rem;
      }

      label {
        display: block;
        font-weight: bold;
        margin-bottom: -1rem;
      }

      input[type="text"],
      input[type="email"],
      input[type="no_hp"],
      input[type="alamat"],
      input[type="link"],
      textarea {
        width: 100%;
        padding: 0.5rem;
        border: 2px solid #057D9F;
        border-radius: 10px;
        background-color: #46b7e3;
        color: #16325B;
        font-size: 1rem;
        padding-left: 1rem;
      }

      input[type="submit"] {
        background-color: #FFF100;
        color: #003964;
        border: none;
        cursor: pointer;
        margin-top: 2rem;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.3s ease;
        width: auto;
        min-width: 120px; /* atau sesuai kebutuhan */
        margin-bottom: 1rem;
      }

    </style>
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
              <th style="padding-top: 1.5rem; padding-left:0.4rem">Rp<?php echo number_format($total_harga + $ongkir, 0, ',', '.'); ?></th>
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
              <label><input type="radio" name="metode_bayar" value="e-money"> E-Money</label><br><br>
              
              <p>Jika memilih metode pembayaran E-Money, maka lakukan pembayaran pada QRIS berikut:</p>
              <img src="img/qris.png" alt="QRIS" style="max-width: 200px;"><br><br>

              <label for="bukti_bayar">Upload Bukti Pembayaran:</label><br>
              <input type="file" id="bukti_bayar" name="bukti_bayar"><br><br>

              <input type="submit" value="Kirim"> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    feather.replace()
  </script>
</body>
</html>
