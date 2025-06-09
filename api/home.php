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
  <title>Barfa Guna Sejahtera</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- My Style -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <!-- Navbar start -->
  <nav class="navbar">
    
    <a class="navbar-brand" href="#">
        <img src="img/logo_barfa.png" alt="logo" width="130" height="80" />
    </a>

    <div class="navbar-nav">
      <a href="home.php" style="color: #08C2FF;">Beranda</a>
      <a href="history.php">History</a>
      <!-- <a href="#menu">Kupon</a> -->
      <a href="about.php">About Us</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <div class="navbar-extra">
      <!-- <a href="#" id="search-button"><i data-feather="search"></i></a> -->
      <a href="keranjang.php"><i data-feather="shopping-cart"></i></a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

  </nav>
  <!-- Navbar end -->

  <!-- Hero Section start -->
  <section class="hero" id="home">
    <div class="mask-container">
      <main class="content">
        <h1>Air <span>Berkualitas</span></h1>
        <p>Kami Siap Antarkan Langsung ke Rumah Anda dengan Pelayanan Terbaik dan Tepat Waktu</p>
        <a href="#products" class="cta">Lihat Produk</a>
      </main>
    </div>
  </section>
  <!-- Hero Section end -->

  <!-- About Section start -->
  <section id="about" class="about">
    <h2><span>Barfa</span> Guna Sejahtera</h2>

    <div class="row">
      <div class="about-img">
        <img src="img/galon.jpeg" alt="Tentang Kami">
      </div>
      <div class="content">
        <h3>Kenapa memilih galon kami?</h3>
        <p>Kami menyediakan air isi ulang berkualitas tinggi dari sumber terpercaya, disaring dengan teknologi modern untuk memastikan kesegaran dan kebersihan setiap tetesnya.</p>
        <p>Dapatkan 1 kupon di setiap pembelian galon. Kumpulkan 10 kupon dan nikmati 1 kali isi ulang gratis. Semakin sering beli, makin cepat dapat bonus!</p>
      </div>
    </div>
  </section>
  <!-- About Section end -->

  <!-- Products Section start -->
  <section class="products" id="products" x-data="products">
  <h2><span>Produk</span> Kami</h2>
  <p>Nikmati kemudahan berbelanja galon secara online dengan harga terjangkau dan pengiriman cepat.</p>

  <div class="row">
    <?php
      $query = mysqli_query($connect, "SELECT * FROM product");
      while ($data = mysqli_fetch_array($query)) {
    ?>
      <div class="product-card">
        <div class="product-icons">
          <a href="beli.php?idproduk=<?php echo $data['id_produk']?>"><i data-feather="shopping-cart"></i></a>

          <a href="#" class="item-detail-button" data-id="<?php echo $data['id_produk']; ?>"><i data-feather="eye"></i></a>
        </div>
        <div class="product-image">
          <img src="img/products/<?php echo $data['gambar']?> " alt="Product Image">
        </div>
        <div class="product-content">
          <h3><?php echo $data['nama_produk']?></h3> 
          <div class="product-price">Rp<?php echo number_format($data['harga'], 0, ',', '.'); ?></div>
        </div>
      </div>
    <?php } ?>
  </div>
  </section>
  <!-- Products Section end -->

  <!-- Footer start -->
  <footer>
  <div class="footer-barfa">
    <div class="logo">
      <img src="img/logo_barfa.png" alt="Logo Barfa">
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

  <!-- Modal Box Item Detail start -->
  <div class="modal" id="item-detail-modal">
  <div class="modal-container">
    <a href="#" class="close-icon"><i data-feather="x"></i></a>
    <div class="modal-content">
      <img src="" alt="Product" id="modal-img" style="max-height: 280px; border-radius: 1rem;">
      <div class="product-content">
        <h3 id="modal-title"></h3>
        <p id="modal-desc" class="mb-5"></p>
        <div class="product-price stok-text" style="font-size: 20px;">
          Stok: <span id="modal-stok"></span>
        </div>
        <?php
          $perintah = mysqli_query($connect, "SELECT * FROM product");
          $simpan = mysqli_fetch_array($perintah);
        ?>
        <a href="beli.php?idproduk=<?php echo $simpan ['id_produk']?>"><i data-feather="shopping-cart"></i>Add to cart</a>
      </div>
    </div>
  </div>
  </div>
  <!-- Modal Box Item Detail end -->

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