<?php
  session_start();
  $username = $_SESSION['username'];
  if (empty($_SESSION['username'])) {
      header("location:login.php?pesan=belum_login");
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

  <!-- Font Awesome -->
  <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">

  <!-- My Style -->
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="faq/style.css">
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
      <!-- <a href="#menu">Kupon</a> -->
      <a href="about.php" style="color: #08C2FF;">About Us</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <div class="navbar-extra">
      <!-- <a href="#" id="search-button"><i data-feather="search"></i></a> -->
      <a href="#" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- Search Form start -->
    <div class="search-form">
      <input type="search" id="search-box" placeholder="search here...">
      <label for="search-box"><i data-feather="search"></i></label>
    </div>
    <!-- Search Form end -->

    <!-- Shopping Cart start -->
    <div class="shopping-cart">
      <div class="cart-item">
        <img src="img/products/1.jpg" alt="Product 1">
        <div class="item-detail">
          <h3>Product 1</h3>
          <div class="item-price">IDR 30K</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
      <div class="cart-item">
        <img src="img/products/1.jpg" alt="Product 1">
        <div class="item-detail">
          <h3>Product 1</h3>
          <div class="item-price">IDR 30K</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
      <div class="cart-item">
        <img src="img/products/1.jpg" alt="Product 1">
        <div class="item-detail">
          <h3>Product 1</h3>
          <div class="item-price">IDR 30K</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
    </div>
    <!-- Shopping Cart end -->

  </nav>
  <!-- Navbar end -->

  <!-- Hero Section start -->
  <section class="hero" id="home">
    <div class="mask-container">
      <main class="content">
        <h1>About <span>Us</span></h1>
      </main>
    </div>
  </section>
  <!-- Hero Section end -->

  <!-- About Section start -->
  <section id="about" class="about">
    
      <div class="about-img">
        <img src="img/logo_barfa.png" alt="Tentang Kami">
      </div>
      <div class="content">
        <p>Barfa Guna Sejahtera adalah bisnis pengiriman galon yang berdiri sejak 2021. Kami menyediakan empat jenis produk utama yaitu Le Minerale 15 L, Aqua 19 L, galon kosong, dan air isi ulang (Reverse Osmosis)</p>
        <p>Sebagai bentuk apresiasi kepada pelanggan, kami menawarkan program loyalitas di mana setiap pembelian satu produk akan mendapatkan satu kupon. Kumpulkan 10 kupon untuk ditukar dengan satu kali isi ulang air gratis</p>
        <p>Kami berkomitmen untuk memberikan layanan terbaik dengan produk berkualitas dan sistem loyalitas yang menguntungkan pelanggan</p>
      </div>
    
  </section>
  <!-- About Section end -->

  <!-- Contact Section start -->
    <section id="contact" class="contact">
  <!-- <h2><span>Jam</span> Operasional</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, provident.</p> -->

  <div class="row">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31625.774440351877!2d110.41079041716365!3d-7.766287431921007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5a26bac9a897%3A0x78aaed4370efa2fc!2sMaguwoharjo%2C%20Kec.%20Depok%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1744038983864!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <!-- UBAH: dari <form> ke <div class="fake-form"> -->
    <div class="fake-form">
    <div class="btn">Jam Operasional</div>
      <div class="input-group">
        <div class="fake-input">Senin-Sabtu : 08:00 - 20:30</div>
      </div>
      <div class="input-group">
        <div class="fake-input">Minggu : 09:00 - 18:00</div>
      </div>
    </div>

  </div>
</section>
<!-- Contact Section end -->

<!-- FAQ -->
<div class="wrapper">
      <h1> FAQ (Frequently Asked Questions)</h1>

      <div class="faq">
        <button class="accordion">
          Bagaimana cara ordernya?
          <i class="fa fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
            Cara ordernya sangat mudah. Setelah register dan login, pilih produk yang akan dibeli dan masukkan ke dalam keranjang. Setelah itu, klik ikon keranjang dan checkout. Bayar sesuai e-banking atau e-money yang dimiliki menggunakan kode QR yang tersedia.
          </p>
        </div>
      </div>

      <div class="faq">
        <button class="accordion">
          Ini ongkirnya berapa?
          <i class="fa fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
            Ongkirnya sangat terjangkau, satu kali pengiriman hanya Rp2.000 saja
          </p>
        </div>
      </div>

      <div class="faq">
        <button class="accordion">
          Bagaimana cara menukar kupon?
          <i class="fa fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
            Setiap satu kali pemesanan, Anda akan mendapat 1 kupon yang akan diberikan kurir saat mengantarkan galon ke alamat. Setelah terkumpul 10 kupon, Anda dapat menukarkannya dengan 1 kali air isi ulang. Caranya, silakan pergi ke Barfa secara online dengan membawa kupon dan galon kosong. Turkarkan kupon kepada karyawan toko yang sedang bertugas.
          </p>
        </div>
      </div>

      <div class="faq">
        <button class="accordion">
          Apakah saya bisa menjual galon kosong di toko ini? Gimana caranya?
          <i class="fa fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
            Bisa! Kamu cukup datang langsung ke toko secara offline dan serahkan galon kosong ke penjaga toko. Nanti akan langsung diproses.
          </p>
        </div>
      </div>
    </div>

    <script>
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
          this.classList.toggle("active");
          this.parentElement.classList.toggle("active");

          var pannel = this.nextElementSibling;

          if (pannel.style.display === "block") {
            pannel.style.display = "none";
          } else {
            pannel.style.display = "block";
          }
        });
      }
    </script>

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

    <!-- <div class="credit">
      <p>Copyright by <a href="">barfagunasejahtera</a>. | &copy; 2025.</p>
    </div> -->
  </footer>
  <!-- Footer end -->
    <script>
        feather.replace();
    </script>
</body>