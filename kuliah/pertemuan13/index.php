<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

//ketika tombol cari diklik
if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="jumbotron ">
    <h1 class="display-4">Daftar Mahasiswa</h1>
    <p class="lead">DataBase Mahasiswa Universitas Pasundan</p>
    <hr class="my-4">
    <p>Belom terdaftar??? Bisa akses tombol dibawah ini!</p>
    <a href="tambah.php" class="btn btn-primary btn-lg" role="button">Tambah Data Mahasiswa</a>
  </div>

  <br><br>
  <form action="" method="POST">
    <input type="text" name="keyword" size="40" placeholder="masukan keyword pencarian.." autocomplete="off" autofocus class="keyword">
    <button type="submit" name="cari" class="tombol-cari btn btn-primary">Cari!</button>
  </form>
  <br>
  <div class="container">


    <table border="1">
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>
      <?php if (empty($mahasiswa)) : ?>
        <tr>
          <td colspan="4">
            <p style="color: red; font-style:italic;">Data Mahasiswa Tidak ditemukan!</p>
          </td>
        </tr>
      <?php endif; ?>


      <?php $i = 1;
      foreach ($mahasiswa as $m) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><img src="img/<?= $m['gambar']; ?>" width="60"></td>
          <td><?= $m['nama']; ?></td>
          <td>
            <a href="detail.php?id=<?= $m['id']; ?>" class="badge badge-primary">lihat detail</a>
          </td>
        </tr>
      <?php endforeach; ?>

    </table>
    <a href="logout.php"><button>Logout</button></a>
  </div>
  <footer class=" text-dark bg-light footer">
    <div class="container">
      <div class="row pt-3">
        <div class="col text-center">
          <p>sulthan jihad abiyyu 2020.</p>
        </div>
      </div>
    </div>


    <script src="js/script.js"></script>
</body>

</html>