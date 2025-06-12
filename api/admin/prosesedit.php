<?php
    include "../koneksi.php";

    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $gambar = $_POST['gambar'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];

    $query_old = mysqli_query($connect, "SELECT * FROM product WHERE id_produk=$id_produk");
    $data_old = mysqli_fetch_assoc($query_old);

    $gambar = $_POST['gambar'];
    if (empty($gambar)) {
        $gambar = $data_old['gambar'];
    }

    $query = mysqli_query($connect, "UPDATE product SET nama_produk='$nama_produk',
        gambar='$gambar', gambar='$gambar', harga='$harga', deskripsi='$deskripsi', stok='$stok' WHERE id_produk=$id_produk");

    if ($query){
        header("location: produk.php");
    } else {
        echo $query;
    }
?>