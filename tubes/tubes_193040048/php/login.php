<?php
session_start();
require 'functions.php';
// cek cookie
if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  //ambil username berdasarkan id
  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);

  //cek cookie dan username
  if ($hash == hash('sha256', $row['id'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: admin.php");
    exit;
  }
}


//melakukan pengecekan apakah user sudah melakukan login
if (isset($_SESSION['username'])) {
  header("Location: admin.php");
  exit;
}
// login
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  //mencocokan usernmae dan password
  if (mysqli_num_rows($cek_user) > 0) {
    $row = mysqli_fetch_assoc($cek_user);
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = hash('sha256', $row['id'], false);

      //JIKA REMEMBER ME DI CENTANG
      if (isset($_POST['remember'])) {
        setcookie('username', $row['username'], time() + 60 * 60 * 24);
        $hash = hash('sha256', $row['id']);
        setcookie('hash', $hash, time() + 60 * 60 * 24);
      }

      if (hash('sha256', $row['id']) == $_SESSION['hash']) {
        header("Location: admin.php");
        die;
      }
      header("Location: ../index.php");
      die;
    }
  }
  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../assets/img/images1.png">
  <title>Books Store</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Permanent Marker', cursive;
      background: linear-gradient(20deg, purple, orange, purple);
    }

    .container {
      border-radius: 5%;
      background: linear-gradient(20deg, purple, orange, purple);
      width: 500px;

    }
  </style>

</head>

<body>
  <!-- awal navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
    <a class="navbar-brand" href="index.php"><a href="index.php" class="brand-logo">
        <div class="hero-logo">
          <img src="../assets/img/images1.png" width="50px">
        </div>
      </a></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Surga Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="php/login.php">Admin </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Postponed launching a book Sorry.. </a>
        </li>
      </ul>

    </div>
  </nav>
  <!-- akhir navbar -->
  <section class="login mt-5" mx-auto>

    <div class="container">
      <form action="" method="post">
        <?php if (isset($error)) : ?>
          <p> Username atau Password Salah!</p>
        <?php endif; ?>
        <form>
          <div class="form-group">
            <label for="username">Login</label>
            <input type="text" class="form-control" placeholder="Enter Username" name="username">
            <small id="emailHelp" class="form-text text-muted">Masukan Username anda yang sudah terdaftar!</small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="form-check remember">
            <input type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label" for="remember">Remember me.</label>
          </div>
          <button type="submit" class="btn btn-info" name="submit">Login</button>
          <div class="registrasi">
            <a href="registrasi.php"><button type="button" class="btn btn-info mt-4">Registrasi</button></a>
          </div>
        </form>
    </div>
  </section>
</body>

<footer class=" text-light bg-dark footer " style="margin-top: 160px">

  <div class="row pt-3">
    <div class="col text-center">
      <p>Surga Buku 2020.</p>
    </div>
  </div>
</footer>

</html>