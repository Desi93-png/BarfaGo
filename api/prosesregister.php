<?php
include "koneksi.php";

$id = $_POST['id']?? '';
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];

$check_query = mysqli_query($connect, "SELECT * FROM pelanggan WHERE username='$username'");
if(mysqli_num_rows($check_query) > 0) {
    $message = "Username sudah tersedia, mohon ganti dengan username lain.";
    echo "<script>alert('$message'); window.location.href = 'register.php';</script>";
} else {
    $query = mysqli_query($connect, "INSERT INTO pelanggan (id, username, password, nama, email, no_hp, alamat) VALUES('$id', '$username', '$password', '$nama', '$email', '$no_hp', '$alamat')") or die(mysqli_error($connect));

    if($query) {
        $message = "Berhasil Registrasi! <br><br> <a href='login.php'><button class='btn btn-dark'>Login Disini</button></a>";
    } else {
        $message = "Gagal Registrasi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: 'CollegeC';
            src: url('collegec.ttf') format('truetype');
        }

        body {
            background-color: rgba(0, 0, 0, 0.7);
            background-image: linear-gradient(to left, #050C9B, #A6E6FF);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            margin-top: 15vh;
            margin-bottom: 15vh;
            background-color: #282828;
            color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px #999da0;
            font-family: monospace;
            font-size: 20px;
            max-width: 50%;
        }

        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="message">
            <?php if(isset($message)) echo $message; ?>
        </div>
    </div>
</body>

</html>