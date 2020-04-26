<?php
require 'functions.php';

$Id = $_GET['Id'];
$bk = query("SELECT * FROM buku WHERE Id = $Id")[0];

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
      alert('Data Berhasil diubah!');
      document.location.href = 'admin.php';
      </script>";
  } else {
    echo "<script>
    alert('Data Gagal diubah!');
    document.location.href = 'admin.php';
    </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
</head>

<body>
  <h3>Form Ubah Data Buku</h3>
  <form action="" method="post">
    <table>
      <tr>
        <td>
          <input type="hidden" name="Id" id="Id" value="<?= $bk['Id']; ?>">
          <label for="Cover">Cover :</label><br>
          <input type="text" name="Cover" id="Cover" required value="<?= $bk['Cover']; ?> "><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <label for="NamaBuku">NamaBuku :</label><br>
          <input type="text" name="NamaBuku" id="NamaBuku" required value="<?= $bk['NamaBuku']; ?> "><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <label for="Pengarang">Pengarang :</label><br>
          <input type="text" name="Pengarang" id="Pengarang" required value="<?= $bk['Pengarang']; ?> "><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <label for="Penerbit">Penerbit :</label><br>
          <input type="text" name="Penerbit" id="Penerbit" required value="<?= $bk['Penerbit']; ?> "><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <label for="Harga">Harga :</label>
          <select name="Harga" id="Harga" required value="<?= $bk['Harga']; ?> ">
            <option value="">---------pilih harga-------</option>
            <option value="Rp.90.000">Rp90.000</option>
            <option value="Rp.100.000">Rp.100.000</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <button type="submit" name="ubah">ubah Data!</button>
          <button type="submit">
            <a href="index.php" style="text-decoration: none; color:black;"></a>kembali</button>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>