<?php
    include "../koneksi.php";
    $id_pesanan = $_GET['id_pesanan'];
    $query = mysqli_query($connect, "SELECT * FROM pesanan WHERE id_pesanan=$id_pesanan");
    $data = mysqli_fetch_array($query);

    // Query ambil produk dari detail_pesanan
    $query_produk = mysqli_query($connect, "SELECT * FROM detail_pesanan WHERE id_pesanan = $id_pesanan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Status</title>
    <style>
        body {
            background-color: #d8f8ff;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .form-card {
            background-color: #53e5ff;
            max-width: 600px;
            margin: 0 auto;
            padding-top: 2rem;
            padding-bottom: 2rem;
            padding-left: 25px;
            padding-right: 45px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            background-color:#F7EEDD;
            border: none;
            border-radius: 8px;
            color: #000;
            font-size: 16px;
        }
        .radio-group {
            margin-left: 10px;
            margin-top: 8px;
        }
        .radio-group label {
            font-weight: normal;
            display: block;
        }
        .submit-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #ffdc00;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h2>UPDATE STATUS</h2>

    <div class="form-card">
        <form method="POST" action="prosesupdate.php">
            <input type="hidden" name="id_pesanan" value= "<?php echo $data['id_pesanan'] ?>" >
            <div class="form-group">
                <label>Nama Penerima</label>
                <input type="text" id="nama" name="nama" value= "<?php echo $data['nama'] ?>" readonly>
            </div>

            <div class="form-group">
                <label>Alamat Email</label>
                <input type="email" id="nama" name="nama" value= "<?php echo $data['email'] ?>" readonly>
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input type="email" id="nama" name="nama" value= "<?php echo $data['no_hp'] ?>" readonly>
            </div>

            <div class="form-group">
                <label>Produk Dibeli</label>
                <?php while ($produk = mysqli_fetch_array($query_produk)) { ?>
                    <input type="text" 
                        value="<?php echo $produk['nama_produk'] . '   |   ' . $produk['jumlah'] . '   |    Rp' . number_format($produk['harga_satuan'], 0, ',', '.'); ?>" 
                        readonly>
                <?php } ?>
            </div>

            <div class="form-group">
                <label>Ongkos Kirim</label>
                <input type="text" name="ongkir" value="Rp2.000" readonly>
            </div>

            <div class="form-group">
                <label>Total Harga</label>
                <input type="email" id="nama" name="nama" value= "Rp<?php echo number_format($data['total_harga'], 0, ',', '.'); ?>" readonly>
            </div>

            <div class="form-group">
                <label>Metode Bayar</label>
                <input type="email" id="nama" name="nama" value= "<?php echo $data['metode_bayar'] ?>" readonly>
            </div>

            <div class="form-group">
                <label>Status Bayar</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="status_bayar" value="Belum Dibayar" 
                            <?php if ($data['status_bayar'] == 'Belum Dibayar') echo 'checked'; ?>>
                        Belum Dibayar
                    </label>
                    <label>
                        <input type="radio" name="status_bayar" value="Sudah Dibayar" 
                            <?php if ($data['status_bayar'] == 'Sudah Dibayar') echo 'checked'; ?>>
                        Sudah Dibayar
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label>Status Kirim</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="status_kirim" value="Diproses" 
                            <?php if ($data['status_kirim'] == 'Diproses') echo 'checked'; ?>>
                        Diproses
                    </label>
                    <label>
                        <input type="radio" name="status_kirim" value="Dikirim" 
                            <?php if ($data['status_kirim'] == 'Dikirim') echo 'checked'; ?>>
                        Dikirim
                    </label>
                    <label>
                        <input type="radio" name="status_kirim" value="Selesai" 
                            <?php if ($data['status_kirim'] == 'Selesai') echo 'checked'; ?>>
                        Selesai
                    </label>
                </div>
            </div>

            <button class="submit-btn" type="submit">Kirim</button>
        </form>
    </div>

</body>
</html>
