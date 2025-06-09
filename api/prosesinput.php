<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cek apakah user sudah login
    if (!isset($_SESSION['username'])) {
        header("Location: login.php?pesan=belum_login");
        exit();
    }

    $username = $_SESSION['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $link = $_POST['link'];
    $metode = $_POST['metode_bayar'];
    $tanggal_pesan = date("Y-m-d");
    $ongkir = 2000;

    if ($metode === 'e-money') {
        $nama_bukti = $_FILES['bukti_bayar']['name'];
        $lokasi_bukti = $_FILES['bukti_bayar']['tmp_name'];
        $tgl_bukti = date('YmdHis').$nama_bukti;
        $folder_tujuan = "img/foto_bukti/";

        // Upload file
        if (move_uploaded_file($lokasi_bukti, $folder_tujuan . $tgl_bukti)) {
            $bukti = $tgl_bukti;
        } else {
            die("Gagal mengupload bukti pembayaran.");
        }
    }


    // Hitung total harga produk
    $total_harga = 0;
    foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah) {
        $query = $connect->query("SELECT * FROM product WHERE id_produk = '$id_produk'");
        $produk = $query->fetch_assoc();
        $subtotal = $produk['harga'] * $jumlah;
        $total_harga += $subtotal;
    }

    $total = $total_harga + $ongkir;

    // Status bayar
    $status_bayar = ($metode === 'e-money') ? 'Sudah dibayar' : 'Belum dibayar';

    // Simpan ke tabel pesanan
    $query_pesanan = $connect->query("INSERT INTO pesanan 
        (username, nama, email, no_hp, alamat, link, total_harga, tanggal_pesan, metode_bayar, bukti_bayar, status_bayar, status_kirim)
        VALUES 
        ('$username', '$nama', '$email', '$no_hp', '$alamat', '$link', '$total', '$tanggal_pesan', '$metode', '$bukti', '$status_bayar', 'Diproses')");

    if (!$query_pesanan) {
        die("Gagal menyimpan pesanan: " . $connect->error);
    }

    $id_pesanan = $connect->insert_id; // Ambil ID pesanan yang baru dibuat

    // Simpan detail pesanan
    foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah) {
        $query = $connect->query("SELECT * FROM product WHERE id_produk = '$id_produk'");
        $produk = $query->fetch_assoc();
        $nama_produk = $produk['nama_produk'];
        $harga_satuan = $produk['harga'];
        $subtotal = $harga_satuan * $jumlah;

        $connect->query("INSERT INTO detail_pesanan 
            (id_pesanan, id_produk, nama_produk, harga_satuan, jumlah, subtotal)
            VALUES 
            ('$id_pesanan', '$id_produk', '$nama_produk', '$harga_satuan', '$jumlah', '$subtotal')");
    }

    // Bersihkan keranjang setelah checkout
    unset($_SESSION['keranjang_belanja']);

    // Redirect ke halaman konfirmasi
    header("Location: konfirmasi.php?id=$id_pesanan");
    exit();
}
?>