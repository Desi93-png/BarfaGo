<?php
  session_start();
  $username = $_SESSION['username'];
  if (empty($_SESSION['username'])) {
      header("location:login.php?pesan=belum_login");
  }

  include '../koneksi.php';

  $query = mysqli_query($connect , "SELECT * FROM admin");
  $data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barfa Guna Sejahtera</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- My Style -->
  <link rel="stylesheet" href="../css/styleadmin.css">

</head>

<body>

  <!-- Navbar start -->
  <nav class="navbar">
    
    <a class="navbar-brand" href="#">
        <img src="../img/logo_barfa.png" alt="logo" width="130" height="80" />
    </a>

    <div class="navbar-nav">
      <a href="home.php" style="color: #08C2FF;">Beranda</a>
      <a href="produk.php">Produk</a>
      <a href="pendapatan.php">Lap.Pendapatan</a>
      <a href="transaksi.php">Lap.Transaksi</a>
      <!-- <a href="about.php">About Us</a> -->
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <div class="navbar-extra">
      <!-- <a href="#" id="search-button"><i data-feather="search"></i></a> -->
      <!-- <a href="keranjang.php"><i data-feather="shopping-cart"></i></a> -->
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- Search Form start -->
    <!-- <div class="search-form">
      <input type="text" name="keyword" size="40" autofocus autocomplete="off" placeholder="Cari...">
      <label for="search-box" name="cari"><i data-feather="search"></i></label>
    </div> -->
    <!-- Search Form end -->

  </nav>
  <!-- Navbar end -->

  <!-- Hero Section start -->
  <section class="hero" id="home">
    <div class="mask-container">
      <main class="content">
        <h1>Welcome <span><?php echo $data['username']; ?></span></h1>
        <p>Anda telah berhasil login sebagai administrator</p>
        <!-- <a href="#products" class="cta">Lihat Produk</a> -->
      </main>
    </div>
  </section>
  <!-- Hero Section end -->

  <!-- About Section start -->
  <section id="about" class="about">
    <h2><span>Barfa</span> Guna Sejahtera</h2>

    <div class="row">
      <div class="content">
        <h3>Apa saja hak akses administrator?</h3>
        <table class="akses">
          <tr>
            <td>1.</td>
            <td>Anda dapat mengubah detail produk, termasuk nama produk, foto, harga, dan deskripsi jika terjadi perubahan yang relevan</td>
          </tr>
          <tr>
            <td>2.</td>
            <td>Anda dapat memperbarui stok produk</td>
          </tr>
          <tr>
            <td>3.</td>
            <td>Anda dapat melihat laporan pendapatan</td>
          </tr>
          <tr>
            <td>4.</td>
            <td>Anda dapat melihat laporan transaksi</td>
          </tr>
        </table>
      </div>
    </div>
  </section>
  <!-- About Section end -->

  <!-- Footer start -->
  <footer>
  <div class="footer-barfa">
    <div class="logo">
      <img src="../img/logo_barfa.png" alt="Logo Barfa">
    </div>
    <div class="barfa-description">
      <h3>Barfa <span>Guna Sejahtera</span></h3>
      <p>Barfa Guna Sejahtera telah melayani kebutuhan air minum berkualitas sejak 2021.
      Kami berkomitmen menghadirkan galon terbaik dengan pelayanan yang cepat dan terpercaya.</p>
    </div>
    <div class="barfa-ikon">
      <p><i data-feather="map-pin"></i>  Jalan Timbul Rejo, Krodan, Maguwoharjo, Sleman</p>
      <p><i data-feather="phone"></i>  0812–4932–1018</p>
    </div>
  </div>
  </footer>
  <!-- Footer end -->


  <!-- Feather Icons -->
  <script>
    feather.replace()
  </script>

  <!-- My Javascript -->
  <script src="js/script.js"></script>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const detailButtons = document.querySelectorAll('.item-detail-button');
    const modal = document.getElementById('item-detail-modal');

    detailButtons.forEach(button => {
      button.addEventListener('click', function (e) {
        e.preventDefault();
        const productId = this.getAttribute('data-id');

        fetch(`get_product.php?id=${productId}`)
          .then(response => response.json())
          .then(data => {
            document.getElementById('modal-img').src = `img/products/${data.gambar}`;
            document.getElementById('modal-title').innerText = data.nama_produk;
            document.getElementById('modal-desc').innerText = data.deskripsi;
            document.getElementById('modal-stok').innerText = data.stok;

            modal.style.display = 'flex';
          });
      });
    });

    document.querySelector('.close-icon').addEventListener('click', function (e) {
      e.preventDefault();
      modal.style.display = 'none';
    });
  });
</script>

</body>

</html>