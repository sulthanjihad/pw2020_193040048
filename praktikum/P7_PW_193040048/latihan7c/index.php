<?php
//menghubungkan dengan file php lainnya
require 'php/functions.php';
$buku = query("SELECT * FROM buku");

//ketika tombol cari diklik
if (isset($_POST['cari'])) {
    $buku = cari($_POST['keyword']);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/img/images1.png">
    <title>Books Store</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .jumbotron {
            background-image: url("assets/img/bg1.jpg");
            background-size: cover;
            height: 1400px;
            margin-top: -900px;
        }

        .jumbotron .display-4 {
            margin-top: 1000px;
        }

        .cardisi {
            position: relative;
        }

        .cardisi img {
            border: 1px solid white;
            position: relative;
            -webkit-transition: all .3s ease;
            -ms-transition: all .3s ease;
            -o-transition: all .3s ease;
            -moz-transition: all .3s ease;
        }

        .cardisi:hover img {
            border: 5px solid black;
            box-shadow: 0 0 100px rgba(0, 0, 0, .5);
            -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, .5);
            -ms-box-shadow: 0 0 5px rgba(0, 0, 0, .5);
            -o-box-shadow: 0 0 5px rgba(0, 0, 0, .5);
            -moz-box-shadow: 0 0 5px rgba(0, 0, 0, .5);
            z-index: 9;
            transform: scale(1.3);
            -webkit-transform: scale(1.3);
            -ms-transform: scale(1.3);
            -o-transform: scale(1.3);
            -moz-transform: scale(1.3);
        }

        .cardisi:hover {
            filter: saturate(200%);
            -webkit-box-shadow: saturate(200%);
            -ms-box-shadow: saturate(200%);
            -o-box-shadow: saturate(200%);
            -moz-box-shadow: (200%);
        }

        .cardisi h5 {
            width: 130%;
            padding: 10 0 10 0;
            margin-top: 20px;
            text-align: center;
            color: black;
            position: absolute;
            bottom: -80px;
            left: -150px;
            opacity: 0;
            z-index: 9;
            transition: all 1s ease;
            -webkit-transforma: all 1s ease;
            -ms-transforma: all 1s ease;
            -o-transforma: all 1s ease;
            -moz-transforma: all 1s ease;
            text-transform: uppercase;
        }

        .cardisi:hover h5 {
            opacity: 1;
            bottom: 10px;
            text-transform: uppercase;
        }
    </style>

</head>

<body data-spy="scroll">
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
        <a class="navbar-brand" href="index.php"><a href="index.php" class="brand-logo">
                <div class="hero-logo">
                    <img src="assets/img/images1.png" width="50px">
                </div>
            </a></a>
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
            <form class="form-inline my-2 my-lg-0" method="POST">
                <input name="keyword" class="keyword form-control mr-sm-2" type="text" size="40" placeholder="Cari Buku Dengan Cara Memasukan Kata!" autofocus autocomplete="off">
                <button class="tombol-cari btn btn-outline-success my-2 my-sm-0" name="cari" id="cari" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- awal jumbotron -->
    <div class="jumbotron jumbotron-fluid bg-info" style="text-align: center">
        <div class="container">
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
            <div class="awal">
                <?php foreach ($buku as $bk) : ?>
                    <div class="cardisi">
                        <h1 class="card-title text-dark">Buku Yang Tersedia.</h1>
                        <div class="card bg-transparent text-white m-5 border-0">
                            <img src="assets/img/<?= $bk["Cover"]; ?>" class="card-img" alt="..." width="150px">
                            <div class="card-img-overlay">
                                <h5 class="card-text mb-5"><a href="php/detail.php?Id=<?= $bk['Id'] ?>" class="alert-link"><?= "$bk[Id]"; ?>.<?= "$bk[NamaBuku]"; ?></a></h5>
                                <h5 class="card-text">silahkan tekan untuk lihat lebih detail.</h5>
                            </div>
                        </div>
                    </div>


                <?php endforeach; ?>
            </div>
            <a href="php/admin.php" class="btn btn-primary tombol m-5">Admin</a>
            <a href="index.php" class="btn btn-primary tombol m-5">Kembali</a>
        </div>
    </section>

    <script src="js/script.js"></script>
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