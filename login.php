<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- <link rel="stylesheet" href="styles.css"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <style>
   *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    }
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url(img/bg_blue.png) no-repeat;
    background-size: cover;
    background-position: center;
    }
    .wrapper {
    width: 500px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(9px);
    color: #fff;
    border-radius: 12px;
    padding: 30px 40px;
    }
    .wrapper h1 {
    font-size: 36px;
    text-align: center;
    }
    .wrapper .input-box {
    position: relative;
    width: 100%;
    height: 50px;

    margin: 30px 0;
    }
    .input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: #fff;
    padding: 20px 70px 20px 20px;
    }
    .input-box i {
    position: absolute;
    right: 20px;
    top: 30%;
    transform: translate(-50%);
    font-size: 20px;
    }
    .wrapper .remember-forgot {
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 15px;
    }
    .remember-forgot label input {
    accent-color: #fff;
    margin-right: 3px;
    }
    .remember-forgot a {
    color: #fff;
    text-decoration: none;
    }
    .remember-forgot a:hover {
    text-decoration: underline;
    }
    .wrapper .btn {
    width: 90%;
    height: 45px;
    background: #fff;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 600;

    display: block;
    margin: 20px auto; /* auto akan membuat tombol berada di tengah */
    }

    .wrapper .register-link {
    font-size: 14.5px;
    text-align: center;
    margin: 20px 0 15px;
    }
    .register-link p a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    }
    .register-link p a:hover {
    text-decoration: underline;
    }

    .input-box button#togglePassword {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    width: 70px;
    border: none;
    
    color: white;
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;
    cursor: pointer;
    background-color: transparent;
    }

    .input-box button#togglePassword.active {
        background-color: #08C2FF; /* biru saat aktif */
    }
    .input-box button#togglePassword i {
        font-size: 18px;
    }
    input::placeholder {
        color: white;
    }
    .message-container {
    margin: 0 auto;
    max-width: 400px;
    text-align: center;
    position: absolute;
    top: 100px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    }
    .message {
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
        margin-bottom: 10px;
        color: white;
    }
    .error, .info{
        background-color: rgba(255, 0, 0, 0.8);
    }
    .success {
      background-color: rgba(0, 128, 0, 0.8); /* hijau */
    }


  </style>
</head>

<body>

<div class="message-container">
          <?php
          if (isset($_GET['pesan'])) {
              $pesan = $_GET['pesan'];
              $message_class = '';
              $message_text = '';

              if ($pesan == "gagal") {
                  $message_class = 'error';
                  $message_text = "Login gagal. Username atau Password salah!";
              } else if ($pesan == "logout") {
                  $message_class = 'success';
                  $message_text = "Anda telah berhasil logout.";
              } else if ($pesan == "belum_login") {
                  $message_class = 'info';
                  $message_text = "Anda harus login untuk mengakses home page.";
              }

              if (!empty($message_text)) {
                  echo '<div class="message ' . $message_class . '">' . $message_text . '</div>';
              }
          }
          ?>
        </div>

    <div class="wrapper">
        <form action="ceklogin.php" method="POST">
        <h1>Login</h1>
        <input type="hidden" name="id" id="id">
        <div class="input-box">
            <input type="text" placeholder="Username" name="username" required>
            <i class='fa fa-user'></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" id="exampleInputPassword1" name="password" required>
            <button type="button" id="togglePassword">
                <i class="fa fa-eye"></i>
            </button>
        </div>

        <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('exampleInputPassword1');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            this.classList.toggle('active');

            const icon = this.querySelector('i');
            // dibalik: kalau type sekarang "text", berarti mata biasa (tidak ada garis)
            if (type === 'text') {
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
            } else {
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
            }
        });
        </script>

      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Dont have an account? <a href="index.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>