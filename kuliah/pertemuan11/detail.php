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
    <table cellpadding:"150" cellspacing:"100" border="1">
      <tr>
        <td><img src="img/<?= $m['gambar']; ?>" width="60"></td>
      </tr>
      <tr>
        <td>NRP : <?= $m['nrp']; ?></td>
      </tr>
      <tr>
        <td>Nama : <?= $m['nama']; ?></td>
      </tr>
      <tr>
        <td>Email : <?= $m['email']; ?></td>
      </tr>
      <tr>
        <td>jurusan : <?= $m['jurusan']; ?></td>
      </tr>

      <tr>
        <td><a href="ubah.php?id=<?= $m['id']; ?>">Ubah</a> </td>
        <td><a href="hapus.php?id=<?= $m['id']; ?>" onclick="return confirm ('apakah anda yakin??')">Hapus</a></td>
      </tr>
      <tr>
        <td><a href="index.php">Kembali Ke daftar mahasiswa</a></td>
      </tr>

    </table>
  </div>
</body>

</html>