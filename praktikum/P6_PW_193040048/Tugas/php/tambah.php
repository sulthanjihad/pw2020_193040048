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
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

  <section class="tambah">
    <div class="container">
      <h1>Form Tambah Data Buku</h1>
      <form action="" method="post">
        <table border="1" style="background-image: url(../assets/img/bgtbl1.jpg)">
          <tr>
            <td>
              <label for="Cover">Cover :</label><br>
            </td>
            <td><input type="text" name="Cover" id="Cover" required></td>
          </tr>
          <tr>
            <td>
              <label for="NamaBuku">NamaBuku :</label><br>
            </td>
            <td>
              <input type="text" name="NamaBuku" id="NamaBuku" required><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <label for="Pengarang">Pengarang :</label><br>
            </td>
            <td>
              <input type="text" name="Pengarang" id="Pengarang" required><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <label for="Penerbit">Penerbit :</label><br>
            </td>
            <td>
              <input type="text" name="Penerbit" id="Penerbit" required><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <label for="Harga">Harga :</label>
            </td>
            <td>
              <select name="Harga" id="Harga" required>
                <option value="">---------pilih harga-------</option>
                <option value="Rp.90.000">Rp90.000</option>
                <option value="Rp.100.000">Rp.100.000</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <button type="submit" name="tambah" class="btn btn-info">Tambah Data!</button>
            </td>
            <td>
              <button type="submit" class="btn btn-info">
                <a href="../index.php" style="text-decoration: none; color:black;"></a>kembali</button>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </section>
</body>

</html>