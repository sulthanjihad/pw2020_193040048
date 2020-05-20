<?php
//AGAR TIDAK MASUK JIKA BELUM LOGIN
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
      alert('Data Berhasil ditambahkan!');
      document.location.href = 'admin.php';
      </script>";
  } else {
    echo "<script>
    alert('Data Gagal ditambahkan!');
    document.location.href = 'admin.php';
    </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../assets/img/images1.png">
  <title>Tambah Data</title>
  <link rel="stylesheet" href="../css/style.">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(20deg, purple, orange, purple);
      font-family: 'Permanent Marker', cursive;
    }

    .container {
      background: linear-gradient(20deg, orange, purple, orange);
      border-radius: 5%;
      width: 900px;
    }

    .tambah img {
      border-radius: 10%;
    }
  </style>

</head>

<body>
  <!-- awal navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
    <a class="navbar-brand" href="index.php"><img src="../assets/img/images1.png" width="50px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Surga Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="php/admin.php">Admin </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Postponed launching a book Sorry.. </a>
        </li>
      </ul>
      <h5>Silahankan Tambah Data!</h5>
    </div>
  </nav>
  <!-- akhir navbar -->


  <section class="tambah">
    <div class="container mx-auto" style="background-image: url(../assets/img/ubh1.jpg)">
      <h1 class="mt-5 text-center">Form Tambah Data Buku</h1>
      <!-- TAMBAH BARU -->
      <form method="post" enctype="multipart/form-data">
        <div class="form-group ">
          <label for="Cover">Cover Buku</label>
          <input type="file" name="Cover" id="Cover" autocomplete="off" class="gambardefault form-control-file" onchange="previewImage()">
          <img src="../assets/img/nophoto.jpg" alt="" width="250" class="img-preview mt-5" style="border:black 1px solid">
          <small id="Cover" class="form-text text-muted">ukuran Cover buku 400x200.</small>
        </div>


        <div class="form-group m-5 mx-auto">
          <label for="NamaBuku">Nama Buku :</label>
          <input type="text" name="NamaBuku" id="NamaBuku" required class="form-control" autocomplete="off" placeholder="Masukan Nama Untuk Judul Buku.">
        </div>

        <div class="form-group m-5 mx-auto">
          <label for="Pengarang">Pengarang :</label>
          <input type="text" name="Pengarang" id="Pengarang" required class="form-control" autocomplete="off" placeholder="Masukan Nama Pengarang Buku.">
        </div>

        <div class="form-group m-5 mx-auto">
          <label for="Penerbit">Penerbit :</label>
          <input type="text" name="Penerbit" id="Penerbit" required class="form-control" autocomplete="off" placeholder="Masukan Nama Penerbit Buku.">
        </div>

        <div class="form-group m-5 mx-auto">
          <label for="Harga">Harga :</label>
          <input type="text" name="Harga" id="Harga" required class="form-control" autocomplete="off" placeholder="Masukan Harga Buku.">
          <small id="Cover" class="form-text text-dark">Diawali RP | Contoh "RP90.000.</small>
        </div>
        <div class="tomboltambah text-center">
          <button type="submit" name="tambah" class="btn btn-primary mr-4">Tambah Data</button>
          <button type="submit" class="btn btn-primary">kembali</button>
        </div>
      </form>
      <!-- TAMBAH BARU -->
      <br>

    </div>
  </section>
  <script src="../js/script.js"></script>
</body>

<footer class=" text-light bg-dark footer mt-5">

  <div class="row pt-3">
    <div class="col text-center">
      <p>Surga Buku 2020.</p>
    </div>
  </div>
</footer>

</html>