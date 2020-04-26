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
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <div class="add">
    <a href="tambah.php">Tambah Data</a>
  </div>
  <form action="" method="get">
    <input type="text" name="keyword" autofocus>
    <button type="submit" name="cari">cari!</button>
  </form>
  <table>
    <tr>
      <th>#</th>
      <th>opsi</th>
      <th>Cover</th>
      <th>Id</th>
      <th>Nama Buku</th>
      <th>Pengarang</th>
      <th>Penerbit</th>
      <th>Harga</th>
    </tr>

    <?php if (empty($buku)) : ?>
      <tr>
        <td colspan="7">
          <h1>Data tidak ditemukan</h1>
        </td>
      </tr>
    <?php else : ?>
      <?php $i = 1; ?>
      <?php foreach ($buku as $bk) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td>
            <a href="ubah.php?Id=<?= $bk['Id'] ?>"><button>Ubah</button></a>
            <a href="hapus.php?Id=<?= $bk['Id'] ?>" onclick="return confirm('Hapus Data?')"><button>hapus</button></a>
          </td>
          <td><img src="../assets/img/<?= $bk['Cover'] ?>"></td>
          <td><?= $bk['Id']; ?></td>
          <td><?= $bk['NamaBuku']; ?></td>
          <td><?= $bk['Pengarang']; ?></td>
          <td><?= $bk['Penerbit']; ?></td>
          <td><?= $bk['Harga']; ?></td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </table>

</body>

</html>