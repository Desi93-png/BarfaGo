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
    background-color: #cdf0f7;
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

  .table {
    width: 100%;
    border-collapse: separate; 
    border-spacing: 0;
    overflow: hidden;
    border-radius: 10px; 
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }

  .table-container {
  overflow-x: auto;
  max-width: 100%;
}

table {
  width: 100%;
  table-layout: fixed; /* Supaya kolom terbagi rata */
}

table th, table td {
  word-wrap: break-word;
  font-size: 0.85rem; /* Kecilkan font kalau perlu */
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
      <a href="history.php" style="color: #08C2FF;">History</a>

      <a href="about.php">About Us</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <div class="navbar-extra">
      <a href="keranjang.php" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a>
    </div>

  </nav>
  <!-- Navbar end -->

  <section class="page-keranjang">
    <div class="container">

    <div class="breadcrumb">
        <div class="card-body">
            <h2>History Pemesanan</h2>
            <p>Berikut adalah riwayat pemesanan produk yang telah Anda lakukan sebelumnya</p>
        </div>
    </div>

    <div class="breadcrumb">
        <div class="card-body">
          <div class="table-container">
            <div class="table-responsive">
              <table class="table" id="tables" >
                <thead style="text-align: left;">
                  
                  <tr>
                    <th style="width: 55px;">No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th style="width: 150px;">No. HP</th>
                    <th style="width: 250px;">Detail Alamat</th>
                    <th>Link Alamat</th>
                    <th>Status Bayar</th>
                    <th>Status Kirim</th>
                    <!-- <th>Bukti Bayar</th> -->
                    <th>Invoice Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query($connect, "SELECT * FROM pesanan");  // Untuk melakukan query
                    $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td style="width: 55px;"><?php echo $no++; ?>.</td>
                          <td> <?php echo $data['nama']?></td>
                            <td> <?php echo $data['email']; ?> </td>
                            <td style="width: 150px;"> <?php echo $data['no_hp']?> </td>
                            <td style="width: 250px;"> <?php echo $data['alamat']?> </td>
                            <td>
                              <a href="<?php echo $data['link']; ?>" target="_blank">Lihat Lokasi</a>
                            </td>
                            <td> <?php echo $data['status_bayar']?> </td>
                            <td> <?php echo $data['status_kirim']?> </td>
                            <!-- <td>
                              <a href="bukti.php?id=<?php echo $data['id_pesanan']; ?>" class="btn-detail">Bukti</a> -->
                            </td>
                            <td>
                              <a href="invoice.php?id=<?php echo $data['id_pesanan']; ?>" class="btn-detail">Invoice</a>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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
