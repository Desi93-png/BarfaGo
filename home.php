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
  <!-- <link rel="stylesheet" href="css/style.css"> -->
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

/* Hero Section */
.hero {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-image: url('img/bg_gunung.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  position: relative;
  -webkit-mask-image: linear-gradient(rgba(0, 0, 0, 1) 85%, rgba(0, 0, 0, 0));
  mask-image: linear-gradient(rgba(0, 0, 0, 1) 85%, rgba(0, 0, 0, 0));
}

.hero::after {
  content: '';
  display: block;
  position: absolute;
  width: 100%;
  height: 30%;
  bottom: 0;
  background: linear-gradient(0deg, rgba(1, 1, 3, 1) 8%, rgba(255, 255, 255, 0) 50%);
}

.hero .content {
  margin-top: 100px;
  padding: 1.4rem 7%;
  max-width: 100rem;
  width: 100%;
  text-align: center;
}

.hero .content h1 {
  font-size: 5em;
  color: #fff;
  text-shadow: 3px 3px 3px rgba(6, 6, 127, 0.5);
  line-height: 1.2;
}

.hero .content h1 span {
  color: var(--primary);
}

.hero .content p {
  font-size: 1.6rem;
  margin-top: 1rem;
  line-height: 1.4;
  font-weight: 500;
  color: #fff;
}

.hero .content .cta {
  margin-top: 1rem;
  display: inline-block;
  padding: 1rem 3rem;
  font-size: 1.4rem;
  color: #fff;
  background-color: var(--primary);
  border-radius: 0.5rem;
  box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
}

/* About Section */
.about,
.menu,
.products,
.contact {
  padding: 8rem 7% 1.4rem;
}

.about h2,
.menu h2,
.products h2,
.contact h2 {
  text-align: center;
  font-size: 2.6rem;
  margin-bottom: 3rem;
}

.about h2 span,
.menu h2 span,
.products h2 span,
.contact h2 span {
  color: var(--primary);
}

.about .row {
  display: flex;
}

.about .row .about-img {
  flex: 1 1 45rem;
}

.about .row .content {
  flex: 1 1 35rem;
  padding: 0 1rem;
}

.about .row .content h3 {
  font-size: 1.8rem;
  margin-bottom: 1rem;
  color: #39BEF9;
}

.about .row .content p {
  margin-bottom: 0.8rem;
  font-size: 1.3rem;
  font-weight: 300;
  line-height: 1.6;
  color: #000;
}

.about-img img {
  width: 100%;            /* Responsif penuh dalam kontainer */
  max-width: 500px;       /* Batas maksimum lebar gambar */
  height: auto;           /* Menjaga rasio aspek */
  border-radius: 10px;    /* Membuat sudut halus */
  margin-left: auto;
  margin-right: auto;
  display: block;         /* Agar margin auto bekerja dengan baik */
}

/* Menu Section */
.menu h2,
.products h2,
.contact h2 {
  margin-bottom: 1rem;
}
.menu p,
.products p,
.contact p {
  text-align: center;
  max-width: 30rem;
  margin: auto;
  font-weight: 400;
  line-height: 1.6;
  font-size: 1.2rem;
  color: #00589A;
}

.menu .row {
  display: flex;
  flex-wrap: wrap;
  margin-top: 5rem;
  justify-content: center;
}

.menu .row .menu-card {
  text-align: center;
  padding-bottom: 4rem;
}

.menu .row .menu-card img {
  border-radius: 50%;
  width: 80%;
}

.menu .row .menu-card .menu-card-title {
  margin: 1rem auto 0.5rem;
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

/* Contact Section */
.contact .row {
  display: flex;
  margin-top: 2rem;
  background-color: #222;
}

.contact .row .map {
  flex: 1 1 45rem;
  width: 100%;
  object-fit: cover;
}

.contact .row form {
  flex: 1 1 45rem;
  padding: 5rem 2rem;
  text-align: center;
}

.contact .row form .input-group {
  display: flex;
  align-items: center;
  margin-top: 2rem;
  background-color: var(--bg);
  border: 1px solid #eee;
  padding-left: 2rem;
}

.contact .row form .input-group input {
  width: 100%;
  padding: 2rem;
  font-size: 1.7rem;
  background: none;
  color: #fff;
}

.contact .row form .btn {
  margin-top: 3rem;
  display: inline-block;
  padding: 1rem 3rem;
  font-size: 1.7rem;
  color: #fff;
  background-color: var(--primary);
  cursor: pointer;
}

/* Footer */
footer {
  background-color: #16325B;
  text-align: center;
  padding: 1rem 0 2rem;
  margin-top: 3rem;
}

footer .credit {
  font-size: 0.8rem;
  margin-bottom: 1px;
}

footer .credit a {
  color: var(--bg);
  font-weight: 600;
}

/* ... */

.footer-barfa {
  display: flex;
  align-items: center;
  gap: 1rem;
  background-color: #16325B;
  padding: 1.4rem 6%;

}

.footer-barfa .logo img {
  max-width: 280px;
  height: auto;
}

.footer-barfa .barfa-description {
  max-width: 600px;
  text-align: left;
}

.footer-barfa .barfa-ikon {
  max-width: 600px;
  text-align: left;
  margin-left: 0px;
}

.footer-barfa .barfa-description h3{
  color: #A7E6FF;
  margin-bottom: 4px;
}
.footer-barfa .barfa-description span{
  color: #3ABEF9;
}

/* Modal Box */
/* Item Detail */
.modal {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.7);
}

.modal-container {
  position: relative;
  background-color: #0057d0;
  color: var(--bg);
  margin: 15% auto;
  padding: 1.2rem;
  border: 1px solid #666;
  width: 80%;
  animation: animateModal 0.5s; 
}

.stok-text {
  font-size: 18px;
  font-weight: bold; /* kalau mau ditebalkan */
  color: #87c8e4;        /* warna opsional */
  margin-top: 1rem;
}

/* Modal Animation */
@keyframes animateModal {
  from {
    top: -300px;
    opacity: 0;
  }
  to {
    top: 0;
    opacity: 1;
  }
}

.modal-container .close-icon {
  position: absolute;
  right: 1rem;
  color: #fff;
}

.modal-content {
  display: flex;
  flex-wrap: nowrap;
}

.modal-content img {
  height: 20rem;
  margin-right: 2rem;
  margin-bottom: 2rem;
}

.modal-content p {
  font-size: 1.2rem;
  line-height: 1.8rem;
  margin-top: 1.2rem;
}

.modal-content a {
  display: flex;
  gap: 1rem;
  width: 12rem;
  background-color: var(--primary);
  color: #fff;
  margin-top: 1rem;
  padding: 1rem 1.6rem;
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
      <a href="home.php" style="color: #08C2FF;">Beranda</a>
      <a href="history.php">History</a>
      <a href="about.php">About Us</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <div class="navbar-extra">
      <a href="keranjang.php"><i data-feather="shopping-cart"></i></a>
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
        <p>Kami menyediakan air berkualitas tinggi dari sumber terpercaya, disaring dengan teknologi modern untuk memastikan kesegaran dan kebersihan setiap tetesnya.</p>
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
          <!-- Stok: <span id="modal-stok"></span> -->
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
            // document.getElementById('modal-stok').innerText = data.stok;

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