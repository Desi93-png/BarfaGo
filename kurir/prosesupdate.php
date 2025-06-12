<?php
    include "../koneksi.php";

    $id_pesanan = $_POST['id_pesanan'];
    $id_detail = $_POST['id_detail'];
    $status_bayar = $_POST['status_bayar'];
    $status_kirim = $_POST['status_kirim'];

    $query_old = mysqli_query($connect, "SELECT * FROM pesanan WHERE id_pesanan=$id_pesanan");
    $data_old = mysqli_fetch_assoc($query_old);

    $query = mysqli_query($connect, "UPDATE pesanan SET status_bayar='$status_bayar',
        status_kirim='$status_kirim' WHERE id_pesanan=$id_pesanan");

    if ($query){
        header("location: semua.php");
    } else {
        echo $query;
    }
?>