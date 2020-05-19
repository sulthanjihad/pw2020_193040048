<?php
require '../php/functions.php';
$buku = cari($_GET['keyword']);
?>

<?php foreach ($buku as $bk) : ?>
  <div class="cardisi">
    <div class="card bg-transparent text-white m-5 border-0">
      <img src="assets/img/<?= $bk["Cover"]; ?>" class="card-img" alt="...">
      <div class="card-img-overlay">
        <h5 class="card-title">Buku Yang Tersedia.</h5>
        <p class="card-text"><a href="php/detail.php?Id=<?= $bk['Id'] ?>" class="alert-link"><?= "$bk[Id]"; ?>.<?= "$bk[NamaBuku]"; ?></a></p>
        <p class="card-text">silahkan tekan untuk lihat lebih detail.</p>
      </div>
    </div>
  </div>


<?php endforeach; ?>