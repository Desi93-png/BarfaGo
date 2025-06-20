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
      min-height: 100vh;
      background: linear-gradient(to right, #cdf0f7, #39BEF9);
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
      max-width: 100%;
      width: 100%;
      text-align: center;
    }

    .hero .content h1 {
      font-size: 5rem;
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
    .contact{
      padding: 8rem 7% 1.4rem;
      margin-bottom: 80px;
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

    .about-img img {
      display: block;
      margin: 0 auto;
      width: 450px;
      height: auto;
    }

    .about p{
      font-size: 1.4rem;
      text-align: center;
      max-width: 70%;
      margin: 1rem auto;
      color: #000;
    }

    /* Contact Section */
    .contact .row {
      display: flex;
      margin: 2rem auto; /* Ini bikin elemen berada di tengah horizontal */
      background-color: #16325B;
      width: 80%;
      align-items: center;
      align-content: center;
      margin-bottom: 200px;
    }

    .contact .row .map {
      flex: 1 1 45rem;
      width: 100%;
      object-fit: cover;
      height: 100%;
    }

    /* Gantikan style form ke .fake-form */
    .contact .row .fake-form {
      flex: 1 1 45rem;
      padding: 5rem 2rem;
      text-align: center;
    }

    .contact .row .fake-form .input-group {
      display: flex;
      align-items: center;
      margin-top: 2rem;
      background-color: var(--bg);
      border: 1px solid #eee;
      padding-left: 2rem;
      height: 80px;
      width: 80%;
    }

    .contact .row .fake-form .input-group {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 2rem auto; /* 2rem untuk atas-bawah, auto untuk kiri-kanan */
      background-color: var(--bg);
      border: 1px solid #eee;
      padding-left: 2rem;
      height: 80px;
      width: 80%;
      color: #00589A;
      font-size: 1.4rem;
    }

    /* Tombol tetap */
    .contact .row .fake-form .btn {
      margin-top: 10px;
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
      margin-top: 15rem;
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
      color: #fff;
    }

    .footer-barfa .barfa-ikon {
      max-width: 600px;
      text-align: left;
      margin-left: 0px;
      color: #fff;
    }

    .footer-barfa .barfa-description h3{
      color: #A7E6FF;
      margin-bottom: 4px;
    }
    .footer-barfa .barfa-description span{
      color: #3ABEF9;
    }

    /* FAQ */
    @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      /* font-family: "Poppins", sans-serif; */
    }

    .wrapper {
      max-width: 75%;
      margin: auto;
    }

    .wrapper > p,
    .wrapper > h1 {
      margin: 1.5rem 0;
      text-align: center;
    }

    .wrapper h1{
      margin-bottom: 50px;
    }

    .wrapper > h1 {
      letter-spacing: 3px;
    }

    .accordion {
      background-color: white;
      color: rgba(0, 0, 0, 0.8);
      cursor: pointer;
      font-size: 1.2rem;
      width: 100%;
      padding: 2rem 2.5rem;
      border: none;
      outline: none;
      transition: 0.4s;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: bold;
    }

    .accordion i {
      font-size: 1.6rem;
    }

    .active,
    .accordion:hover {
      background-color: #f1f7f5;
    }
    .pannel {
      padding: 0 2rem 2.5rem 2rem;
      background-color: white;
      overflow: hidden;
      background-color: #f1f7f5;
      display: none;
    }
    .pannel p {
      color: rgba(0, 0, 0, 0.7);
      font-size: 1.2rem;
      line-height: 1.4;
    }

    .faq {
      border: 1px solid rgba(0, 0, 0, 0.2);
      margin: 10px 0;
    }
    .faq.active {
      border: none;
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
      <!-- <a href="#menu">Kupon</a> -->
      <a href="about.php" style="color: #08C2FF;">About Us</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <div class="navbar-extra">
      <a href="keranjang.php" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a>
    </div>

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
            Cara ordernya sangat mudah. Setelah register dan login, pilih produk yang akan dibeli dan masukkan ke dalam keranjang. Setelah itu, klik ikon keranjang dan checkout. Bayar cash atau E-Money menggunakan QRIS.
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

  </footer>
  <!-- Footer end -->

    <script>
        feather.replace();
    </script>

</body>