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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/img/<?= $buku["Cover"]; ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">
                    <p><?= $buku["NamaBuku"]; ?></p>
                </h5>
                <p class="card-text">sinopsis</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $buku["Pengarang"]; ?></li>
                <li class="list-group-item"><?= $buku["Penerbit"]; ?></li>
                <li class="list-group-item"><?= $buku["Harga"]; ?></li>
            </ul>
            <div class="card-body">
                <a href="../index.php" class="card-link">Kembali</a>
            </div>
        </div>

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