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
    <link rel="stylesheet" href="../css/detail.css">

    <title>Document</title>
</head>

<body>

    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="index.php">Surga Buku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            </ul>
            <span class="navbar-text mr-4">
                You Seen A Books <?= $buku["NamaBuku"]; ?>.
            </span>
            <a href="../index.php"> <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Kembali</button></a>
        </div>
    </nav>
    <!-- akhir navbar -->


    <section class="detail">
        <div class="container">
            <div class="card border-danger mx-auto m-4 p-2" style="width: 300px; ">
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
            </div>

        </div>
    </section>
</body>
<footer class=" text-light bg-dark footer">
    <div class="container">
        <div class="row pt-3">
            <div class="col text-center">
                <p>Surga Buku 2020.</p>
            </div>
        </div>
    </div>
</footer>

</html>