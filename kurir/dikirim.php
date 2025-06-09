<?php
  session_start();
  $username = $_SESSION['username'];
  if (empty($_SESSION['username'])) {
      header("location:login.php?pesan=belum_login");
  }

  include '../koneksi.php';
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

  <!-- Font Awosome -->
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
    position: relative;
    z-index: 0;
    color: #fff;
    background-color: var(--bg);
    overflow-x: hidden;
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
  
  #hamburger-menu {
    display: none;
  }
  
  /* Navbar search form */
  .navbar .search-form {
    position: absolute;
    top: 100%;
    right: 7%;
    background-color: #00589A;
    width: 50rem;
    height: 5rem;
    display: flex;
    align-items: center;
    transform: scaleY(0);
    transform-origin: top;
    transition: 0.3s;
  }
  
  .navbar .search-form.active {
    transform: scaleY(1);
  }
  
  .navbar .search-form input {
    height: 100%;
    width: 100%;
    font-size: 1.6rem;
    color: var(--bg);
    padding: 1rem;
  }
  
  .navbar .search-form label {
    cursor: pointer;
    font-size: 2rem;
    margin-right: 1.5rem;
    color: var(--bg);
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
    text-align: center;
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

  .desc{
    margin-top: 3rem;
    text-align: left;
    color: #cdf0f7;
    margin-bottom: 1rem;
    max-width: 500px;
  }

  .info-row {
  display: flex;
  margin-bottom: 8px;
}

.label {
  width: 150px; /* Sesuaikan panjangnya biar rata */
  font-weight: bold;
}

.value {
  flex: 1;
}

  .card-body{
    color: #fff;
  }

  .table {
    width: 100%;
    border-collapse: separate; 
    border-spacing: 0;
    overflow: hidden;
    border-radius: 10px; 
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }

  .table-responsive {
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
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

 /* Gaya umum untuk tombol */
a {
    display: inline-flex;
    align-items: center;
    padding: 8px 5px;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 10px;
    font-weight: bold;
    margin-right: 10px; /* Jarak antar tombol */
    transition: background-color 0.3s ease, transform 0.3s ease;
}

/* Tolbol Plus - Biru */
.btn-plus {
    background-color: #007bff; /* Warna hijau */
    margin-bottom: 2rem;
    padding: 0.8rem 0.8rem;
    border-radius: 15px;
    font-size: 0.8rem;
}

.btn-plus i {
    color: white; /* Warna ikon putih */
}

/* Tombol Edit - Hijau */
.btn-edit {
    background-color: #2ecc71; /* Warna hijau */
}

.btn-edit i {
    color: white; /* Warna ikon putih */
}

/* Tombol Trash - Merah */
.btn-delete {
    background-color: #e74c3c; /* Warna merah */
}

.btn-delete i {
    color: white; /* Warna ikon putih */
}

/* Efek hover pada tombol */
a:hover {
    transform: scale(1.1); /* Efek zoom sedikit */
}

/* Efek hover pada tombol Edit */
.btn-edit:hover {
    background-color:rgb(29, 88, 204); /* Hijau lebih gelap saat hover */
}

/* Efek hover pada tombol Tambah */
.btn-edit:hover {
    background-color: #27ae60; /* Hijau lebih gelap saat hover */
}

/* Efek hover pada tombol Trash */
.btn-delete:hover {
    background-color: #c0392b; /* Merah lebih gelap saat hover */
}

.action-wrapper {
    display: inline-block;
    vertical-align: middle;
    display: flex;
}

.action-wrapper a {
    vertical-align: middle;
}

.btn-detail {
  background-color: #057D9F;
  color: white;
  border: none;
  padding: 6px 12px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 14px;
  transition: background-color 0.3s ease;
  display: inline-block;
  }

  .btn-detail:hover {
    background-color: #045d76;
  }

  /* Footer */
  footer {
    background-color: #16325B;
    text-align: center;
    padding: 1rem 0 2rem;
    margin-top: 11rem;
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
  
  /* Media Queries */
  /* Laptop */
  @media (max-width: 1366px) {
    html {
      font-size: 75%;
    }
  }
  
  /* Tablet */
  @media (max-width: 758px) {
    html {
      font-size: 62.5%;
    }
  
    #hamburger-menu {
      display: inline-block;
    }
  
    .navbar .navbar-nav {
      position: absolute;
      top: 100%;
      right: -100%;
      background-color: #fff;
      width: 30rem;
      height: 100vh;
      transition: 0.3s;
    }
  
    .navbar .navbar-nav.active {
      right: 0;
    }
  
    .navbar .navbar-nav a {
      color: var(--bg);
      display: block;
      margin: 1.5rem;
      padding: 0.5rem;
      font-size: 2rem;
    }
  
    .navbar .navbar-nav a::after {
      transform-origin: 0 0;
    }
  
    .navbar .navbar-nav a:hover::after {
      transform: scaleX(0.2);
    }
  
    .navbar .search-form {
      width: 90%;
      right: 2rem;
    }
  
    .about .row {
      display: flex;
      flex-wrap: wrap;
      max-width: 50%;
    }
  
    .about .row .about-img img {
      height: 24rem;
      object-fit: cover;
      object-position: center;
    }
  
    .about .row .content {
      padding: 0;
    }
  
    .about .row .content h3 {
      margin-top: 1rem;
      font-size: 2rem;
    }
  
    .about .row .content p {
      font-size: 1.6rem;
    }
  
    .menu p {
      font-size: 1.2rem;
    }
  
    .contact .row {
      flex-wrap: wrap;
    }
  
    .contact .row .map {
      height: 30rem;
    }
  
    .contact .row form {
      padding-top: 0;
    }
  
    .modal-content {
      flex-wrap: wrap;
    }
  }
  
  /* Mobile Phone */
  @media (max-width: 450px) {
    html {
      font-size: 55%;
    }
  }


  </style>

</head>

<body>

  <!-- Navbar start -->
  <nav class="navbar">
    
    <a class="navbar-brand" href="#">
        <img src="../img/logo_barfa.png" alt="logo" width="130" height="80" />
    </a>

    <div class="navbar-nav">
      <a href="semua.php">Semua</a>
      <a href="perlukirim.php">Perlu Kirim</a>
      <a href="dikirim.php" style="color: #08C2FF;">Dikirim</a>
      <a href="selesai.php">Selesai</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <div class="navbar-extra">
      <!-- <a href="#" id="search-button"><i data-feather="search"></i></a> -->
      <!-- <a href="keranjang.php" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a> -->
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

  </nav>
  <!-- Navbar end -->

  <section class="page-keranjang">
    <div class="container">

    <h4 style="color: #000;">Daftar pesanan yang sedang dalam perjalanan ke pelanggan</h4>
    <p style="color: #000; margin-bottom: 1rem;">Pastikan pengiriman berjalan lancar dan tepat waktu</p>

      <div class="breadcrumb">
        <div class="card-body">
          <div class="table-responsive">
          <table class="table" id="tables">
              <thead style="text-align: left;">
                  <tr>
                      <th>No.</th>
                      <th>Nama Penerima</th>
                      <th>Status Bayar</th>
                      <th>Status Kirim</th>
                      <th>Link Alamat</th>
                      <th>Opsi</th>
                  </tr>
              </thead>
              <tbody>
              <?php
                $no = 1;
                $query = "SELECT * from pesanan WHERE status_kirim='Dikirim'";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr style="text-align:left;">
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['status_bayar']; ?></td>
                    <td><?php echo $row['status_kirim']; ?></td>
                    <td>
                        <a href="<?php echo htmlspecialchars($row['link']); ?>" target="_blank" style="color: #3ABEF9;">Lihat Lokasi</a>
                    </td>
                    <td>
                        <a href="update.php?id_pesanan=<?php echo $row['id_pesanan']; ?>" class="btn-detail">Update
                        </a>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
              </tbody>
          </table>
          </div>
        </div>

   
    </div>

  </div>
  </section>

  <!-- Tambahkan CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
  document.getElementById('downloadBtn').addEventListener('click', () => {
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF();

    html2canvas(document.querySelector(".page-keranjang")).then(canvas => {
      const imgData = canvas.toDataURL("image/png");
      const imgProps = pdf.getImageProperties(imgData);
      const pdfWidth = pdf.internal.pageSize.getWidth();
      const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

      pdf.addImage(imgData, "PNG", 0, 0, pdfWidth, pdfHeight);
      pdf.save("laporan-pendapatan.pdf");
    });
  });
</script>


  <!-- Feather Icons -->
  <script>
    feather.replace()
  </script>

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

</body>

</html>