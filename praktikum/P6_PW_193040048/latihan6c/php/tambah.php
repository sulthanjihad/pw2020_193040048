<?php
require 'functions.php';

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
      alert('Data Berhasil ditambahkan!');
      document.location.href = 'admin.php';
      </script>";
  } else {
    echo "<script>
    alert('Data Gagal ditambahkan!');
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
  <h3>Form Tambah Data Buku</h3>
  <form action="" method="post">
    <table>
      <tr>
        <td>
          <label for="Cover">Cover :</label><br>
          <input type="text" name="Cover" id="Cover" required><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <label for="NamaBuku">NamaBuku :</label><br>
          <input type="text" name="NamaBuku" id="NamaBuku" required><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <label for="Pengarang">Pengarang :</label><br>
          <input type="text" name="Pengarang" id="Pengarang" required><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <label for="Penerbit">Penerbit :</label><br>
          <input type="text" name="Penerbit" id="Penerbit" required><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <label for="Harga">Harga :</label>
          <select name="Harga" id="Harga" required>
            <option value="">---------pilih harga-------</option>
            <option value="Rp.90.000">Rp90.000</option>
            <option value="Rp.100.000">Rp.100.000</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <button type="submit" name="tambah">Tambah Data!</button>
          <button type="submit">
            <a href="index.php" style="text-decoration: none; color:black;"></a>kembali</button>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>