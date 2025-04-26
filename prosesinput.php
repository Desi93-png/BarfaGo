<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $link = $_POST['link'];
    $tanggal_pesan = date("Y-m-d");

    $total_harga = 0;
    $ongkir = 2000;

    // Hitung total dari keranjang
    foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah) {
        $query = $connect->query("SELECT * FROM product WHERE id_produk = '$id_produk'");
        $produk = $query->fetch_assoc();
        $subtotal = $produk['harga'] * $jumlah;
        $total_harga += $subtotal;
    }

    $total = $total_harga + $ongkir;

    // Simpan ke tabel pesanan
    $query_pesanan = $connect->query("INSERT INTO pesanan (username, nama, email, no_hp, alamat, link, total_harga, tanggal_pesan)
        VALUES ('$username', '$nama', '$email', '$no_hp', '$alamat', '$link', '$total', '$tanggal_pesan')");

    $id_pesanan = $connect->insert_id; // Dapatkan ID pesanan terakhir

    // Simpan detail pesanan
    foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah) {
        $query = $connect->query("SELECT * FROM product WHERE id_produk = '$id_produk'");
        $produk = $query->fetch_assoc();
        $nama_produk = $produk['nama_produk'];
        $harga_satuan = $produk['harga'];
        $subtotal = $harga_satuan * $jumlah;

        $connect->query("INSERT INTO detail_pesanan (id_pesanan, id_produk, nama_produk, harga_satuan, jumlah,  subtotal)
            VALUES ('$id_pesanan', '$id_produk', '$nama_produk', '$harga_satuan', '$jumlah', '$subtotal')");
    }

    // Bersihkan keranjang setelah checkout
    unset($_SESSION['keranjang_belanja']);

    // Redirect ke halaman sukses
    header("Location: konfirmasi.php?id=$id_pesanan");
    exit();
}
?>
