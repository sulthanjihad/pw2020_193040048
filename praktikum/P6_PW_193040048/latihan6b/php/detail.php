<?php

//mengecek apakah ada id yang dikirimkan
//jika tidak maka akan dikembalikan ke halaman index.php
if (!isset($_GET['Id'])) {
    header("location: ../index.php");
    exit;
}

require 'functions.php';

//mengambil id dari url
$Id = $_GET['Id'];

// melakukan query dengan parameter id yang diambil dari url
$buku = query("SELECT * FROM buku WHERE Id = $Id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="gambar">
            <img src="../assets/img/<?= $buku["Cover"]; ?>" alt="">
        </div>

        <div class="keterangan">
            <p><?= $buku["Id"]; ?></p>
            <p><?= $buku["NamaBuku"]; ?></p>
            <p><?= $buku["Pengarang"]; ?></p>
            <p><?= $buku["Penerbit"]; ?></p>
            <p><?= $buku["Harga"]; ?></p>
        </div>

        <button class="tombol-kembali"><a href="../index.php">kembali</a></button>
    </div>
</body>

</html>