<?php
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
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
  <!-- NAVBAR -->

  <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
      <a class="navbar-brand" href="#">Surga Buku</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="../index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item tombol btn btn-primary" href="php/admin.php">Admin</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- AKHIR NAVBAR -->

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid " id="home">
    <div class="jumbotronadmin">
      <h1 class="display-4"> Selamat datang<span> Admin </span><br> Untuk menambah data silahkan tekan <span> Tombol </span> dibawah ini. </h1>
      <div class="add">
        <a href="tambah.php" class="btn btn-primary tombol">Tambah Data!</a>
      </div>
    </div>
  </div>

  <div class="container">
    <form action="" method="get">
      <input type="text" name="keyword" size="40" placeholder="masukan keyword pencarian.." autocomplete="off" autofocus>
      <button type="submit" name="cari" class="m-4 btn btn-info">cari!</button>
    </form>

    <?php if (empty($buku)) : ?>
      <h1>Data tidak ditemukan!!!</h1>
    <?php else : ?>

      <table class=" tabeladmin" border="2">
        <tr>
          <th>#</th>
          <th>Cover</th>
          <th>Nama Buku</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Harga</th>
          <th>opsi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($buku as $bk) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><img src="../assets/img/<?= $bk['Cover'] ?>"></td>
            <td><?= $bk['NamaBuku']; ?></td>
            <td><?= $bk['Pengarang']; ?></td>
            <td><?= $bk['Penerbit']; ?></td>
            <td><?= $bk['Harga']; ?></td>
            <td>
              <a href="ubah.php?Id=<?= $bk['Id'] ?>" class="btn btn-info">Ubah</a>
              <a href="hapus.php?Id=<?= $bk['Id'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger">hapus</a>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      <?php endif; ?>
      </table>
  </div>
</body>
<footer class=" text-dark bg-light footer">
  <div class="container">
    <div class="row pt-3">
      <div class="col text-center">
        <p>Surga Buku 2020.</p>
      </div>
    </div>
  </div>

</footer>

</html>