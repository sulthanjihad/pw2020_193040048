<?php
//AGAR TIDAK MASUK JIKA BELUM LOGIN
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

$Id = $_GET['Id'];

if (hapus($Id) > 0) {
  echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'admin.php';
      </script>";
} else {
  echo "<script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'admin.php';
      </script>";
}
