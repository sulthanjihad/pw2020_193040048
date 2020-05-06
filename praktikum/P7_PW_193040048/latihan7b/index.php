<?php
//menghubungkan dengan file php lainnya
require 'php/functions.php';

if (isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
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
    <title>Buku</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>

<body data-spy="scroll">
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
        <a class="navbar-brand" href="index.php">Surga Buku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="php/login.php">Admin </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">-</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Postponed launching a book Sorry.. </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="get">
                <input name="keyword" class="form-control mr-sm-2" type="search" size="40" placeholder="Cari Buku Dengan Cara Memasukan Kata!" autofocus autocomplete="off">
                <button class="btn btn-outline-success my-2 my-sm-0" name="cari" id="cari" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- awal jumbotron -->
    <div class="jumbotron jumbotron-fluid bg-info" style="text-align: center">
        <div class="container">
            <h1 class="display-4 text-light">Surga Buku~</h1>
            <p class="lead text-light">Pentingnya membaca untuk memperkaya isi kepala. </p>
        </div>
    </div>
    <!-- akhir jumbotron -->



    <section class="isi">
        <div class="container">
            <h1>Daftar Buku-Buku di website kami.</h1>
            <br><br>
            <br>
            <!--jika tidak ada hasil pencarian -->
            <?php if (empty($buku)) : ?>
                <h1>Data Tidak Ditemukan!!</h1>
            <?php endif; ?>
            <!-- pemberentian pengkondisian-->


            <br><br>
            <?php foreach ($buku as $bk) : ?>
                <div class="cardisi">
                    <div class="card bg-transparent text-white m-5 border-0">
                        <img src="assets/img/<?= $bk["Cover"]; ?>" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Buku Yang Tersedia.</h5>
                            <p class="card-text"><a href="php/detail.php?Id=<?= $bk['Id'] ?>" class="alert-link"><?= "$bk[Id]"; ?>.<?= "$bk[NamaBuku]"; ?></a></p>
                            <p class="card-text">silahkan tekan untuk lihat lebih detail.</p>
                        </div>
                    </div>
                </div>


            <?php endforeach; ?>
            <a href="php/admin.php" class="btn btn-primary tombol m-5">Admin</a>
            <a href="index.php" class="btn btn-primary tombol m-5">Kembali</a>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>