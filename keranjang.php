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
  <link rel="stylesheet" href="css/style4.css">

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
      <!-- <a href="#menu">Kupon</a> -->
      <a href="about.php">About Us</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <div class="navbar-extra">
      <!-- <a href="#" id="search-button"><i data-feather="search"></i></a> -->
        <a href="keranjang.php" id="shopping-cart-button">
            <i data-feather="shopping-cart" style="color: #08C2FF;"></i>
        </a>
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
                        <!-- <th>Opsi</th> -->
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
