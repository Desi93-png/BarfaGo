<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form | Dan Aleko</title>
  <!-- <link rel="stylesheet" href="styles.css"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <style>
    * {
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
      .wrapper .input-box-alamat {
        position: relative;
        width: 100%;
        height: 100px;

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
        padding: 20px 45px 20px 20px;
      }
      .input-box-alamat textarea {
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 40px;
        font-size: 16px;
        color: #fff;
        padding: 20px 45px 20px 20px;
      }
      .input-box input::placeholder {
        color: #fff;
      }
      .input-box-alamat textarea::placeholder {
        color: #fff;
      }
      .input-box i {
        position: absolute;
        right: 20px;
        top: 30%;
        transform: translate(-50%);
        font-size: 20px;
      }
      .input-box-alamat i {
        position: absolute;
        right: 20px;
        top: 45%;
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
  </style>
</head>

<body>
  <div class="wrapper">
    <form action="prosesregister.php" method="POST">
      <h1>Register</h1>
      <input type="hidden" name="id" id="id">
      <div class="input-box">
        <input type="text" placeholder="Username" name="username" required>
        <i class='fa fa-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name="password" required>
        <i class='fa fa-lock' ></i>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Nama Lengkap" name="nama" required>
        <i class='fa fa-pencil'></i>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Alamat Email" name="email" required>
        <i class='fa fa-envelope'></i>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Nomor HP" name="no_hp" required>
        <i class='fa fa-phone'></i>
      </div>
      <div class="input-box-alamat">
      <textarea placeholder="Alamat" name="alamat" required></textarea>
        <i class='fa fa-location-arrow'></i>
      </div>
      <!-- <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div> -->
      <button type="submit" class="btn">Register</button>
      <div class="register-link">
        <p>Already have an account? <a href="login.php">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>