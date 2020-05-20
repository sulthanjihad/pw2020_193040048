<?php
require 'functions.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('Registrasi Berhasil');
            document.location.href = 'login.php';
            </script>";
  } else {
    echo "<script>
    alert('Registrasi Gagal');
    </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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

  <section class="registrasi mt-5">
    <div class="container">
      <form action="" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Enter Username">
          <small class="form-text text-muted">Masukan Username yang ingin dipakai.</small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password">
          <small class="form-text text-muted">Lebih aman password lebih dari 8 huruf</small>
        </div>
        <button type="submit" name="register" class="btn btn-info">Register.</button>
      </form>
    </div>
  </section>
</body>

<footer class=" text-light bg-dark footer " style="margin-top: 230px">

  <div class="row pt-3">
    <div class="col text-center">
      <p>Surga Buku 2020.</p>
    </div>
  </div>
</footer>

</html>