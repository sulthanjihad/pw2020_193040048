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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>

<body data-spy="scroll" data-target="#navbar-example">

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="#">Surga Buku</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="#home">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item tombol btn btn-primary" href="php/admin.php">Admin</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- AKHIR NAVBAR -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid " id="home">
        <div class="container">
            <h1 class="display-4"> Mari kita <span>Membaca </span><br> untuk memperkaya <span> isi kepala. </span> </h1>
            <a href="#cari" class="btn btn-primary tombol">Yu Baca!!</a>
        </div>
    </div>

    <section class="isi">
        <div class="container">
            <form action="" method="get">
                <input type="text" name="keyword" size="40" placeholder="masukan keyword pencarian.." autocomplete="off" autofocus>
                <button type="submit" class="btn btn-info" name="cari" id="cari">cari!</button>

                <!--jika tidak ada hasil pencarian -->
                <?php if (empty($buku)) : ?>
                    <h1>Data tidak ditemukan!!</h1>
                <?php endif; ?>
                <!-- pemberentian pengkondisian-->

            </form>
            <br><br>

            <?php foreach ($buku as $bk) : ?>

                <div class="NamaBuku alert alert-primary mt-4 " role="alert">
                    Data Buku yang ada di website kami <a href="php/detail.php?Id=<?= $bk['Id'] ?>" class="alert-link"><?= "$bk[Id]"; ?>.<?= "$bk[NamaBuku]"; ?></a> Lihat lebih detail.
                </div>

            <?php endforeach; ?>
            <a href="php/admin.php" class="btn btn-primary tombol">Admin</a>
            <a href="index.php" class="btn btn-primary tombol">Kembali</a>
        </div>
    </section>
</body>
<footer class=" text-dark bg-light footer">
    <div class="container">
        <div class="row pt-3">
            <div class="col text-center">
                <p>Surga Buku 2020.</p>
            </div>
        </div>
    </div>

</footer>

</html>