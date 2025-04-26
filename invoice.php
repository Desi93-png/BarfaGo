<?php
  session_start();
  $username = $_SESSION['username'];
  if (empty($_SESSION['username'])) {
      header("location:login.php?pesan=belum_login");
  }

  include 'koneksi.php';

  $id_pesanan = $_GET['id'];
  $query = mysqli_query($connect , "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'");
  $data = mysqli_fetch_array($query);

  $kueri = mysqli_query($connect , "SELECT * FROM detail_pesanan WHERE id_pesanan = '$id_pesanan'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Invoice</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Font Awosome -->
  <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">

  <!-- Style -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9f9f9;
      color: #333;
      padding: 20px;
    }

    .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      border: 1px solid #ddd;
      background: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.15);
    }

    h1, h3 {
      text-align: center;
      color: #444;
    }

    .detail-row {
      margin-bottom: 10px;
    }

    .detail-row strong {
      display: inline-block;
      width: 150px;
    }

    hr {
      border: 0;
      border-top: 1px solid #eee;
      margin: 20px 0;
    }

    .total-section {
      text-align: right;
      margin-top: 30px;
    }

    .btn-download {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #003964;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }

    @media print {
      .btn-download {
        display: none;
      }
    }
  </style>
</head>
<body>

  <!-- Tombol Download PDF -->
  <button class="btn-download" onclick="downloadPDF()">
    <i class="fa fa-download" aria-hidden="true"></i>
    Download PDF
  </button>

  <!-- Invoice Content -->
  <div class="invoice-box" id="invoice-content">
    <h1>Invoice</h1>
    <h3>Detail Pesanan</h3>

    <div class="detail-row"><strong>Nama Lengkap:</strong> <?php echo $data['nama']; ?></div>
    <div class="detail-row"><strong>Email:</strong> <?php echo $data['email']; ?></div>
    <div class="detail-row"><strong>No HP:</strong> <?php echo $data['no_hp']; ?></div>
    <div class="detail-row"><strong>Alamat:</strong> <?php echo $data['alamat']; ?></div>
    <div class="detail-row"><strong>Link Maps:</strong> <?php echo $data['link']; ?></div>
    <div class="detail-row"><strong>Tanggal Pesanan:</strong> <?php echo $data['tanggal_pesan']; ?></div>

    <hr>

    <h3>Produk yang Dipesan:</h3>
    <?php while ($show = mysqli_fetch_array($kueri)) { ?>
      <div class="detail-row"><strong>Nama Produk:</strong> <?php echo $show['nama_produk']; ?></div>
      <div class="detail-row"><strong>Harga Satuan:</strong> Rp<?php echo number_format($show['harga_satuan'], 0, ',', '.'); ?></div>
      <div class="detail-row"><strong>Jumlah:</strong> <?php echo $show['jumlah']; ?></div>
      <div class="detail-row"><strong>Subtotal:</strong> Rp<?php echo number_format($show['subtotal']); ?></div>
      <hr>
    <?php } ?>

    <div class="total-section">
      <p><strong>Total: Rp<?php echo number_format($data['total_harga'], 0, ',', '.'); ?></strong></p>
      <p><strong>Ongkir: Rp<?php echo number_format(2000, 0, ',', '.'); ?></strong></p>
      <?php $grandtotal = $data['total_harga'] + 2000; ?>
      <p><strong>Grand Total: Rp<?php echo number_format($grandtotal, 0, ',', '.'); ?></strong></p>
    </div>
  </div>

  <!-- HTML2PDF Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script>
    function downloadPDF() {
      const element = document.getElementById("invoice-content");
      const opt = {
        margin:       0.5,
        filename:     'invoice_<?php echo $data['nama']; ?>.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
      };
      html2pdf().set(opt).from(element).save();
    }
  </script>
</body>
</html>
