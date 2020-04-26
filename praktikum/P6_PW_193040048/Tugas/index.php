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
</head>

<body>
    <?php if (empty($buku)) : ?>
        <tr>
            <td colspan="7">
                <h1>Data tidak ditemukan</h1>
            </td>
        </tr>
    <?php endif; ?>
    <div class="container">
        <form action="" method="get">
            <input type="text" name="keyword" autofocus>
            <button type="submit" name="cari">cari!</button>
        </form>
        <?php foreach ($buku as $bk) : ?>
            <p class="NamaBuku">
                <a href="php/detail.php?Id=<?= $bk['Id'] ?> ">
                    <?= "$bk[Id]"; ?>
                </a>
                <a href="php/detail.php?Id=<?= $bk['Id'] ?> ">
                    <?= "$bk[NamaBuku]"; ?>
                </a>
            </p>
        <?php endforeach; ?>
        <a href="php/admin.php"> <button>admin</button></a>
        <a href="index.php"><button>kembali</button></a>
    </div>

</body>

</html>