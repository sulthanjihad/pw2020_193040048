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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
</head>
<body>
    <div class="container">
        <h3>Daftar buku</h3>
        <table border="1" cellpadding="8" cellspacing="0" style="text-align : center " >
            <tr>
                <th>Id</th>
                <th>Cover</th>
                <th>Nama Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Harga</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($buku as $bk) : ?>
                <tr>
                <td><?= $i ?></td>  
                <td><img src="assets/img/<?= $bk['Cover']; ?>" height="150px"></td>
                <td><?= $bk['NamaBuku'] ?></td>
                <td><?= $bk['Pengarang'] ?></td>
                <td><?= $bk['Penerbit'] ?></td>
                <td><?= $bk['Harga'] ?></td>

            <?php $i++ ?>
            <?php endforeach; ?>
            </tr>

        </table>
    </div>
</body>
</html>