<?php
//menghubungkan dengan file php lainnya
require 'php/functions.php';

//melakukan query
$buku =  query("SELECT * FROM buku");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buku</title>
</head>
<body>
    <div class="container">
        <?php foreach ($buku as $bk) : ?>
            <p class="NamaBuku">
                <a href="php/detail.php?Id=<?= $bk['Id'] ?> ">
                    <?= "$bk[Id]";?>
                </a>
                <a href="php/detail.php?Id=<?= $bk['Id'] ?> ">
                    <?= "$bk[NamaBuku]";?>
                </a>
            </p>
        <?php endforeach; ?>
    </div>
</body>
</html>