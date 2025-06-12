<?php
  session_start();
  $username = $_SESSION['username'];
  if (empty($_SESSION['username'])) {
      header("location:login.php?pesan=belum_login");
  }

  include 'koneksi.php';
  
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

    .products{
      padding: 8rem 7% 1.4rem;
    }

    /* Products Section */
    .products .row {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
      gap: 1.5rem;
      margin-top: 4rem;
    }

    .products .product-card {
      text-align: center;
      border: 1px solid #00589A;
      padding: 2rem;
      background-color: #90e0ef;
      width: 50;
    }

    .products .product-konfir {
      text-align: center;
      border: 1px solid #90e0ef;
      padding: 2rem;
      background-color: #003964;
      width: 50;
      color: #fff;
      border-radius: 20px;
      margin-top: 3rem;
    }

    .products .product-history {
      display: block; /* atau inline-block jika kamu pakai <a> atau <button> */
      margin: 0 auto; /* ini yang bikin tombol ke tengah */
      text-align: center;
      border: 1px solid #90e0ef;
      padding: 0.8rem;
      background-color: #003964;
      width: 10%;
      color: #fff; /* warna tulisan putih */
      border-radius: 20px;
      text-decoration: none; /* jika pakai <a> agar underline hilang */
      margin-top: 1rem;
    }

    .products .product-history a{
      color: #0096c7;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;  
    }

    .products .product-icons {
      display: flex;
      justify-content: center;
      gap: 0.5rem;
    }

    .products .product-icons a {
      width: 4rem;
      height: 4rem;
      color: #0096c7;
      margin: 0.3rem;
      border: 1px solid #fff;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .products .product-icons a:hover {
      background-color: var(--primary);
      border: 1px solid var(--primary);
    }

    .products .product-image {
      padding: 1rem 0;
    }

    .products .product-image img {
      height: 25rem;
    }

    .products .product-content h3 {
      margin-top: 20px;
      font-size: 2rem;
      color: var(--primary);

    }

    .products .product-stars {
      font-size: 1.7rem;
      padding: 0.8rem;
      color: var(--primary);
    }

    .products .product-stars .star-full {
      fill: var(--primary);
    }

    .products .product-price {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .products .product-price span {
      text-decoration: line-through;
      font-weight: bold;
      font-size: 1rem;
    }

    /* Media Queries */
    /* Laptop */
    @media (max-width: 1366px) {
      html {
        font-size: 75%;
      }
    }
  </style>

</head>

<body>

  <!-- Navbar start -->
  <nav class="navbar">
    
    <a class="navbar-brand" href="#">
        <img src="img/logo_barfa.png" alt="logo" width="130" height="80" />
    </a>

    <div class="navbar-nav">
      <a href="home.php">Beranda</a>
      <a href="history.php">History</a>
      <a href="about.php">About Us</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <div class="navbar-extra">
      <a href="keranjang.php"><i data-feather="shopping-cart"></i></a>
    </div>

  </nav>
  <!-- Navbar end -->

  <!-- Products Section start -->
  <section class="products" id="products" x-data="products">
    <div class="product-konfir">
    Terima kasih, pesanan Anda telah kami terima dan sedang diproses. Mohon menunggu, kurir kami akan segera mengirimkan pesanan Anda. Silakan klik tombol berikut untuk melihat faktur Anda
    </div>

    <div class="product-history">
        <a href="history.php">Lihat History</a>
    </div>
  </section>
  <!-- Products Section end -->

  <!-- Feather Icons -->
  <script>
    feather.replace()
  </script>

</body>

</html>