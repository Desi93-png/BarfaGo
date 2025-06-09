<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($connect, "SELECT * FROM product WHERE id_produk='$id'");
    $data = mysqli_fetch_assoc($query);
    echo json_encode($data);
}
?>
