<?php
//melakukan koneksi ke data base
$conn = mysqli_connect("localhost", "root","") or die ("koneksi ke DB gagal");

//memilih database
mysqli_select_db($conn, "tubes_193040048") or die("Database salah!");

//query mengambil objek dari tabel didalam database
$result = mysqli_query($conn, "SELECT * FROM buku");


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
            <?php while($row = mysqli_fetch_assoc($result)) :?>
                <tr>
                <td><?= $i ?></td>  
                <td><img src="assets/img/<?= $row['Cover']; ?>" height="150px"></td>
                <td><?= $row['NamaBuku'] ?></td>
                <td><?= $row['Pengarang'] ?></td>
                <td><?= $row['Penerbit'] ?></td>
                <td><?= $row['Harga'] ?></td>

            <?php $i++ ?>
            <?php endwhile; ?>
            </tr>

        </table>
    </div>
</body>
</html>