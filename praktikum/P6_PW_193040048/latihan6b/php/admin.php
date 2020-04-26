<?php
//menghubungkan dengan file php lainnya
require 'functions.php';

//melakukan query
$buku =  query("SELECT * FROM buku");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <div class="add">
    <a href="tambah.php">Tambah Data</a>
  </div>
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

    <?php $i = 1; ?>
    <?php foreach ($buku as $bk) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a href=""><button>Ubah</button></a>
          <a href=""><button>Hapus</button></a>
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
  </table>

</body>

</html>