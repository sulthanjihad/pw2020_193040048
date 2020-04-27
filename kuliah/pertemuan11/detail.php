<?php
require 'functions.php';

//ambil id dari url
$id = $_GET['id'];

$m = query("SELECT * FROM mahasiswa WHERE id =$id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail mahasiswa</title>
</head>

<body>
  <h3>Detail mahasiswa</h3>
  <div class="container">
    <table cellpadding:"15" cellspacing:"10">
      <ul>
        <li><img src="img/<?= $m['gambar']; ?>" width="60"></li>
        <li>NRP : <?= $m['nrp']; ?></li>
        <li>Nama : <?= $m['nama']; ?></li>
        <li>Email : <?= $m['email']; ?></li>
        <li>jurusan : <?= $m['jurusan']; ?></li>
        <li><a href="ubah.php?id=<?= $m['id']; ?>">Ubah</a> |<a href="hapus.php?id=<?= $m['id']; ?>" onclick="return confirm ('apakah anda yakin??')">Hapus</a></li>
        <li><a href="index.php">Kembali Ke daftar mahasiswa</a></li>
      </ul>
    </table>
  </div>
</body>

</html>