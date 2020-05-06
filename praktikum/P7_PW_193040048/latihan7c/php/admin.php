<?php
//AGAR TIDAK MASUK JIKA BELUM LOGIN
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

//menghubungkan dengan file php lainnya
require 'functions.php';

if (isset($_GET['cari'])) {
  $keyword = $_GET['keyword'];
  echo $keyword;
  $buku = query("SELECT * FROM buku WHERE
                  NamaBuku LIKE '%$keyword%'  OR
                  Pengarang LIKE '%$keyword%' OR
                  Penerbit LIKE '%$keyword%'  OR
                  Harga LIKE '%$keyword%'     ");
} else {
  $buku = query("SELECT * FROM buku");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tubes_193040048</title>
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

  <!-- jumbotron -->
  <div class="jumbotron text-center bg-primary">
    <h1 class="display-4">Surga Buku</h1>
    <p class="lead">Mari membaca untuk memperkaya isi kepala.</p>
    <hr class="my-4">
    <p>Tambah Data tekan tombol dibawah ini!</p>
    <p class="lead">
      <a class="btn btn-info btn-lg" href="tambah.php" role="button">Tambah Data!</a>
    </p>
  </div>
  <!-- jumbotron -->
  <div class="container">

    <?php if (empty($buku)) : ?>
      <h1>Data tidak ditemukan!!!</h1>
    <?php else : ?>
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="#">#</th>
            <th scope="col">Cover</th>
            <th scope="col">NamaBuku</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Harga</th>
            <th scope="col">opsi</th>
          </tr>
        <tbody>

          <?php $i = 1; ?>
          <?php foreach ($buku as $bk) : ?>

            <tr class="text-center">
              <td><?= $i; ?></td>

              <td><img src="../assets/img/<?= $bk['Cover'] ?>"></td>

              <td><?= $bk['NamaBuku']; ?></td>
              <td><?= $bk['Pengarang']; ?></td>
              <td><?= $bk['Penerbit']; ?>t</td>
              <td><?= $bk['Harga']; ?></td>
              <td>
                <a href="ubah.php?Id=<?= $bk['Id'] ?>" class="btn btn-info mb-5">Ubah</a>
                <a href="hapus.php?Id=<?= $bk['Id'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger mt-5">hapus</a></td>
            </tr>

        </tbody>
        <?php $i++; ?>
      <?php endforeach; ?>
    <?php endif; ?>
      </table>
      </thead>

      <div class="logout">
        <a href="logout.php"><button class="btn btn-info">Logout</button></a>
      </div>
  </div>
</body>
<footer class=" text-light bg-dark footer mt-4">
  <div class="container">
    <div class="row pt-3">
      <div class="col text-center">
        <p>Surga Buku 2020.</p>
      </div>
    </div>
  </div>
</footer>

</html>