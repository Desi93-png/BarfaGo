<?php
  session_start();
  $username = $_SESSION['username'];
  if (empty($_SESSION['username'])) {
      header("location:login.php?pesan=belum_login");
  }

  include 'koneksi.php';

    if (isset($_GET['tambah'])) {
        $id = $_GET['tambah'];
        $_SESSION['keranjang_belanja'][$id] += 1;
        header('Location: keranjang.php');
        exit;
    }

    if (isset($_GET['kurangi'])) {
        $id = $_GET['kurangi'];
        if ($_SESSION['keranjang_belanja'][$id] > 1) {
            $_SESSION['keranjang_belanja'][$id] -= 1;
        } else {
            unset($_SESSION['keranjang_belanja'][$id]);
        }
        header('Location: keranjang.php');
        exit;
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
  <!-- <link rel="stylesheet" href="css/style4.css"> -->
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
        position: relative;
        z-index: 0;
        color: #fff;
        background-color: #000; /* fallback */
        overflow-x: hidden;
    }
    
    body::before {
        content: "";
        background-image: url('img/bg_gunung.jpg');
        background-size: cover;
        background-position: center;
        position: fixed; /* agar tetap di tempat */
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        opacity: 0.3; /* ubah sesuai keinginan: 0.1 - 1 */
        z-index: -1;
    }
    
    
    /* Navbar */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.4rem 7%;
        /* background-color: rgba(199, 233, 245, 0.8); */
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

    .breadcrumb{
        padding: 15px 30px;
        margin-bottom: 20px;
        background-color: #003964;
        border-radius: 10px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, .5);
        margin-right: 80px;
        margin-left: 80px;
    }

    .breadcrumb-a{
        padding: 15px 30px;
        margin-bottom: 20px;
        background-color: #003964;
        border-radius: 10px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, .5);
        margin-right: 80px;
        margin-left: 80px;
        width: 30%;
    }

    .card-body{
        color: #fff;
    }

        .tabel-wrapper {
        overflow-x: auto;
        width: 100%;
        }

    .table {
        width: 100%;
        min-width: 600px;
        border-collapse: collapse;
        border-collapse: separate; /* penting: biar border-radius bisa jalan */
        border-spacing: 0;
        overflow: hidden;
        border-radius: 10px; /* ini bikin ujung tabel agak bulat */
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    .table thead tr:first-child th:first-child {
        border-top-left-radius: 10px;
    }
    
    .table thead tr:first-child th:last-child {
        border-top-right-radius: 10px;
    }
    
    .table tbody tr:last-child td:first-child {
        border-bottom-left-radius: 10px;
    }
    
    .table tbody tr:last-child td:last-child {
        border-bottom-right-radius: 10px;
    }
    
    .table thead {
        background-color: #007bff;
        color: #fff;
    }
    
    .table th, .table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
    }
    
    .table tbody tr:hover {
        /* background-color: #f1f1f1; */
        transition: background-color 0.2s ease;
    }
    
    .table td img {
        max-width: 60px;
        border-radius: 8px;
    }

    .jumlah-produk {
        display: flex;
        margin-top: 3.2rem;
        align-items: center;
        justify-content: left;
        gap: 10px;
    }
    .jumlah-produk i{
        padding-bottom: 3rem;
    }
    
    .btn-jumlah {
        background-color: #057D9F;
        color: white;
        border: none;
        width: 28px;
        height: 28px;
        border-radius: 8px;
        font-size: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 3rem;
    }
    
    .jumlah-angka {
        font-size: 18px;
        color: white;
        min-width: 20px;
        text-align: center;
        padding-bottom: 3rem;
    }
        
    .btn-hapus {
        background-color: #dc3545; /* warna merah */
        color: white;
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    
    .btn-hapus:hover {
        background-color: #c82333; /* merah lebih gelap saat hover */
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

    .btn-kembali{
        color: white;
    }
    .btn-checkout{
        color: #003964;
    }

    .btn-kembali{
        background-color: #ff0000;
    }

    .btn-checkout{
        background-color: #FFF100;
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
        <a href="keranjang.php" id="shopping-cart-button">
            <i data-feather="shopping-cart" style="color: #08C2FF;"></i>
        </a>
    </div>


  </nav>
  <!-- Navbar end -->

  <section class="page-keranjang">
    <div class="container">

    <div class="breadcrumb">
        <div class="card-body">
            <h2>Keranjang Belanja</h2>
            <p>Di sini adalah produk yang telah Anda masukkan ke keranjang</p>
        </div>
    </div>

    <div class="breadcrumb">
        <div class="card-body">
            <?php
                if (!isset($_SESSION['keranjang_belanja']) || empty($_SESSION['keranjang_belanja'])) {
                    echo "Keranjang kosong";
            ?>
                <div class="card-header">
                <div class="card-actions">
                <a href="home.php#products" class="btn-kembali">Kembali Belanja</a>
                
            </div>
        </div>
            <?php
                } else {
            ?>

        <div class="tabel-wrapper">
            <table class="table" id="tables" >
                <thead style="text-align: left;">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $total_produk = 0;
                        $total_harga = 0;
                        foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah):
                        $ambil = $connect->query("SELECT * FROM product WHERE id_produk = '$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subtotal = $pecah['harga']*$jumlah;
                        $total_produk += $jumlah;
                        $total_harga += $subtotal;
                    ?>
                        <tr>
                            <td> <?php echo $no++; ?> </td>
                            <td> 
                                <img src="img/products/<?php echo $pecah['gambar']?> " width="70">
                            </td>
                            <td> <?php echo $pecah['nama_produk']; ?> </td>

                            <td class="jumlah-produk">
                                <a href="keranjang.php?kurangi=<?php echo $id_produk; ?>" class="btn-jumlah kurang">
                                    <i data-feather="minus" style="width: 18px; height: 18px;"></i>
                                </a>

                                <span class="jumlah-angka"><?php echo $jumlah; ?></span>

                                <a href="keranjang.php?tambah=<?php echo $id_produk; ?>" class="btn-jumlah tambah">
                                    <i data-feather="plus" style="width: 18px; height: 18px;"></i>
                                </a>
                            </td>

                            <td>Rp<?php echo number_format($pecah['harga'], 0, ',', '.'); ?> </td>
                            <td>Rp<?php echo number_format($subtotal, 0, ',', '.'); ?> </td>
                            <!-- <td>
                                <a href="#" class="btn-hapus">Hapus</i></a>
                            </td> -->
                        </tr>
                    <?php endforeach ?>

                        <tr style="color: #A6E6FF;">
                            <th colspan="5">Total Harga:</th>
                            <th style="text-align: left;">Rp<?php echo number_format($total_harga, 0, ',', '.'); ?></th>
                            <th> </th>
                        </tr>
                </tbody>
            </table>
            </div>
        </div>

        <div class="card-header">
            <div class="card-actions">
                <a href="home.php#products" class="btn-kembali">Kembali Belanja</a>
                <a href="checkout.php" class="btn-checkout">Checkout</a>
            </div>
        </div>

        <?php
            }
        ?>

    </div>

  </div>
  </section>

  <!-- Feather Icons -->
  <script>
    feather.replace()
  </script>


</body>

</html>
