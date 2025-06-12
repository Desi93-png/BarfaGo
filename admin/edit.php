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
  <!-- <link rel="stylesheet" href="../css/style5.css"> -->

  <!-- <script src="src/app.js"></script> -->

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

      .page-keranjang{
        margin: 2rem 0;
        margin-top: 10rem;
        padding: 1.4rem 7%;
      }

      .breadcrumb {
        padding: 15px 30px;
        margin-bottom: 20px;
        background-color: #003964;
        border-radius: 10px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, .5);
        max-width: 100%;
        width: 100%;
        box-sizing: border-box;
        margin-left: auto;
        margin-right: auto;
      }

      .breadcrumb-a { 
        padding: 15px 30px;
        margin-bottom: 20px;
        background-color: #003964;
        border-radius: 10px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, .5);
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        max-width: 400px; /* atau 500px, sesuai kebutuhan */
        box-sizing: border-box;
      }

      input[type="text"],
      textarea {
        width: 100%;
        padding: 0.5rem;
        border: 2px solid #057D9F;
        border-radius: 10px;
        background-color: #46b7e3;
        color: #16325B;
        font-size: 1rem;
        padding-left: 1rem;
      }

      input[type="submit"] {
        background-color: #FFF100;
        color: #003964;
        border: none;
        cursor: pointer;
        margin-top: 2rem;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.3s ease;
        width: auto;
        min-width: 120px; /* atau sesuai kebutuhan */
        margin-bottom: 1rem;
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
      <a href="produk.php">Beranda</a>
      <a href="pendapatan.php">Lap.Pendapatan</a>
      <a href="transaksi.php">Lap.Transaksi</a>
      <a href="logout.php" style="color: red;">Logout</a>
    </div>

    <!-- Search Form start -->
    <div class="search-form">
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
