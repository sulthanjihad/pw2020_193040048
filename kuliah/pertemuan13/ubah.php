<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

//ambil id dari url
$id = $_GET['id'];

//query mahasiswa berdasarkan id
$m = query("SELECT * FROM mahasiswa WHERE id = $id");


//cek apakah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {


    echo "<script>
    alert('data berhasil diubah');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "data gagal diubah!";
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ubah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Ubah Data Mahasiswa</h3>
  <div class="container">
    <form action="" method="POST">
      <input type="hidden" name="id" value="<?= $m['id']; ?>">
      <table cellspacing:"10" cellpadding:"10">
        <ul>
          <li>
            <label>
              Nama :
              <input type="text" name="nama" autofocus required value="<?= $m['nama']; ?>">
            </label>
          </li>
          <li>
            <label>
              NRP :
              <input type="text" name="nrp" required value="<?= $m['nrp']; ?>">
            </label>
          </li>
          <li>
            <label>
              Email :
              <input type="text" name="email" required value="<?= $m['email']; ?>">
            </label>
          </li>
          <li>
            <label>
              Jurusan :
              <input type="text" name="jurusan" required value="<?= $m['jurusan']; ?>">
            </label>
          <li>
            <label>
              gambar
              <input type="text" name="gambar" required value="<?= $m['gambar']; ?>">
            </label>
          </li>
          </li>
          <li>
            <button type="submit" name="ubah">ubah data!</button>
          </li>
        </ul>
      </table>
    </form>
  </div>
</body>

</html>