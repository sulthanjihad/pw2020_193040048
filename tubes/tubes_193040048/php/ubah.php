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
  <link rel="icon" type="image/png" href="../assets/img/images1.png">
  <title>Ubah Data!</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Permanent Marker', cursive;
      background: linear-gradient(20deg, purple, orange, purple);
    }

    span {
      text-decoration-line: underline;
    }

    .container {
      border-radius: 5%;
      width: 900px;


    }

    .ubah img {
      border-radius: 5%;
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
      <h5>Anda Sedang Mengubah Data Buku
        <span class="navbar-text mr-4 text-Dark">
          <?= $bk["NamaBuku"]; ?>.
        </span>
      </h5>
    </div>
  </nav>
  <!-- akhir navbar -->

  <section class="ubah">
    <div class="container" style="background-image: url(../assets/img/ubh1.jpg)">
      <h3 class="text-center mt-5">Form Ubah Data Buku</h3>
      <form method="post" enctype="multipart/form-data">
        <div class="form-group ubah">
          <input type="hidden" name="Id" id="Id" value="<?= $bk['Id']; ?>">
          <input type="hidden" name="Cover_lama" value="<?= $bk['Cover']; ?> ">
          <label for="Cover">Cover :</label><input type="file" name="Cover" id="Cover" autocomplete="off" class="gambardefault form-control-file" onchange="previewImage()">
          <img src="../assets/img/<?= $bk['Cover']; ?>" alt="" width="250" class="img-preview mt-5" style="border:black 1px solid">
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
        <div class="tombolubah text-center mb-5">
          <button type="submit" name="ubah" class="btn btn-primary mr-4 mb-5">Ubah Data!</button>
          <a href="admin.php"><button type="submit" class="btn btn-primary mb-5">kembali</button></a>
        </div>
      </form>

    </div>
  </section>
  <script src="../js/script.js"></script>
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