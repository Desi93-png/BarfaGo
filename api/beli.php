<?php
  session_start();
  $username = $_SESSION['username'];
  if (empty($_SESSION['username'])) {
      header("location:login.php?pesan=belum_login");
  }

  include 'koneksi.php';

  $id_produk = $_GET['idproduk'];

    if (isset($_SESSION['keranjang_belanja'][$id_produk])) {
      $_SESSION['keranjang_belanja'][$id_produk] += 1;
    } else {
      $_SESSION['keranjang_belanja'][$id_produk] = 1;
    }

    echo "<script>alert('Produk berhasil masuk ke keranjang. Silakan klik ikon keranjang');</script>";
    echo "<script>location='home.php';</script>";
  
?>