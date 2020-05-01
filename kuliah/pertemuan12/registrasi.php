<?php
require 'functions.php';

if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
      alert('user baru berhasil ditambahkan. silahkan login!');
      document.location.href = 'login.php';
    </script>";
  } else {
    echo 'user gagal ditambahkan!';
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
</head>

<body>
  <h3>Form Registrasi</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label>Username :</label>
        <input type="text" name="username" autofocus autocomplete="off" required>
      </li>
      <li>
        <label>Password :</label>
        <input type="password" name="password1" required>
      </li>
      <li>
        <label>Konfirmasi Password :</label>
        <input type="password" name="password2" required>
      </li>
      <li>
        <button type="submit" name="registrasi">Registrasi</button>
      </li>
    </ul>
  </form>


</body>

</html>