<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

//cek apakah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {


    echo "<script>
    alert('data berhasil ditambahkan');
    document.location.href = 'index.php';
    </script>
    
    ";
  } else {
    echo "data gagal ditambahkan!";
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Tambah Data Mahasiswa</h3>
  <div class="container">
    <form action="" method="POST">
      <table cellspacing:"10" cellpadding:"10">
        <ul>
          <li>
            <label>
              Nama :
              <input type="text" name="nama" autofocus required>
            </label>
          </li>
          <li>
            <label>
              NRP :
              <input type="text" name="nrp" required>
            </label>
          </li>
          <li>
            <label>
              Email :
              <input type="text" name="email" required>
            </label>
          </li>
          <li>
            <label>
              Jurusan :
              <input type="text" name="jurusan" required>
            </label>
          <li>
            <label>
              gambar
              <input type="text" name="gambar" required>
            </label>
          </li>
          </li>
          <li>
            <button type="submit" name="tambah">tambah data!</button>
          </li>
        </ul>
      </table>
    </form>
  </div>
</body>

</html>