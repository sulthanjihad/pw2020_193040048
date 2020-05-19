<?php
//AGAR TIDAK MASUK JIKA BELUM LOGIN
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

$Id = $_GET['Id'];
$bk = query("SELECT * FROM buku WHERE Id = $Id")[0];

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
      alert('Data Berhasil diubah!');
      document.location.href = 'admin.php';
      </script>";
  } else {
    echo "<script>
    alert('Data Gagal diubah!');
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
  <title>Tambah Data</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

  <!-- awal navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
    <a class="navbar-brand" href="index.php">Surga Buku</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="php/admin.php">Admin </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">-</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Postponed launching a book Sorry.. </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="get">
        <input name="keyword" class="form-control mr-sm-2" type="search" size="40" placeholder="Cari Buku Dengan Cara Memasukan Kata!" autofocus autocomplete="off">
        <button class="btn btn-outline-success my-2 my-sm-0" name="cari" id="cari" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <!-- akhir navbar -->

  <section class="ubah">
    <div class="container">
      <h3 class="text-center mt-5">Form Ubah Data Buku</h3>
      <form method="post">
        <div class="form-group m-5 mx-auto">
          <input type="hidden" name="Id" id="Id" value="<?= $bk['Id']; ?>">
          <label for="Cover">Cover :</label>
          <input type="text" name="Cover" id="Cover" value="<?= $bk['Cover']; ?> " class="form-control">
          <small id="Cover" class="form-text text-muted">ukuran Cover buku 400x200.</small>
        </div>

        <div class="form-group m-5 mx-auto">
          <label for="NamaBuku">Nama Buku :</label>
          <input type="text" name="NamaBuku" id="NamaBuku" required value="<?= $bk['NamaBuku']; ?> " class="form-control">
        </div>

        <div class="form-group m-5 mx-auto">
          <label for="Pengarang">Pengarang :</label>
          <input type="text" name="Pengarang" id="Pengarang" required value="<?= $bk['Pengarang']; ?> " class="form-control">
        </div>

        <div class="form-group m-5 mx-auto">
          <label for="Penerbit">Penerbit :</label>
          <input type="text" name="Penerbit" id="Penerbit" required value="<?= $bk['Penerbit']; ?> " class="form-control">
        </div>

        <div class="form-group m-5 mx-auto">
          <label for="Harga">Harga :</label>
          <input type="text" name="Harga" id="Harga" required value="<?= $bk['Harga']; ?> " class="form-control">
          <small id="Cover" class="form-text text-muted">Diawali RP | Contoh "RP90.000.</small>
        </div>

        <button type="submit" name="ubah" class="btn btn-primary mr-4">Ubah Data!</button>
        <a href="admin.php"><button type="submit" class="btn btn-primary">kembali</button></a>
      </form>

    </div>
  </section>
</body>

<footer class=" text-light bg-dark footer mt-5">
  <div class="container">
    <div class="row pt-3">
      <div class="col text-center">
        <p>Surga Buku 2020.</p>
      </div>
    </div>
  </div>
</footer>

</html>