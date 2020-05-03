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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
  <!-- AKHIR NAVBAR -->
  <a class="tombol btn btn-primary" href="php/admin.php">Admin</a>
  <div class="add">
    <br>
    <a href="tambah.php" class="btn btn-primary tombol">Tambah Data!</a>
  </div>

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
</body>

</html>