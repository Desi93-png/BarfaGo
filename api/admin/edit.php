<?php
  session_start();
  $username = $_SESSION['username'];
  if (empty($_SESSION['username'])) {
      header("location:login.php?pesan=belum_login");
  }

  include '../koneksi.php';

  $id_produk = $_GET['id_produk'];
  $query = mysqli_query($connect, "SELECT * FROM product WHERE id_produk=$id_produk");
  $data = mysqli_fetch_array($query);

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
  <link rel="stylesheet" href="../css/style5.css">

   <script src="src/app.js"></script>
</head>

<body>

  <!-- Navbar start -->
  <nav class="navbar">
    
    <a class="navbar-brand" href="#">
        <img src="../img/logo_barfa.png" alt="logo" width="130" height="80" />
    </a>

    <div class="navbar-nav">
      <a href="produk.php">Beranda</a>
      <a href="pendapatan.php">Lap.Pendapatan</a>
      <a href="transaksi.php">Lap.Transaksi</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <div class="navbar-extra">
      <!-- <a href="#" id="search-button"><i data-feather="search"></i></a> -->
      <!-- <a href="keranjang.php" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a> -->
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

    <div class="container">
        <div class="breadcrumb">
        <h2 style="text-align: center; padding-top: 1.5rem; font-size: 2.5rem;">EDIT</h2>
            <div class="card-body">
                <form action="prosesedit.php" method="POST">
                    <input type="hidden" name="id_produk" value= "<?php echo $data['id_produk'] ?>" > 
                    <label style="margin-top: 1rem"; for="nama_produk">Nama produk</label><br>
                    <input type="text" id="nama_produk" name="nama_produk" value= "<?php echo $data['nama_produk'] ?>"><br><br>

                    <label for="gambar">Foto produk</label><br>
                    <input type="file" id="gambar" name="gambar" value= "<?php echo $data['gambar'] ?>"><br><br>

                    <label for="harga">Harga</label><br>
                    <input type="text" id="harga" name="harga" value= "<?php echo $data['harga'] ?>"><br><br>

                    <label for="deskripsi">Deskripsi</label><br>
                    <textarea name="deskripsi"><?php echo $data['deskripsi'] ?></textarea><br><br>

                    <label for="stok">Stok</label><br>
                    <input type="text" id="stok" name="stok" value= "<?php echo $data['stok'] ?>"><br><br>

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
