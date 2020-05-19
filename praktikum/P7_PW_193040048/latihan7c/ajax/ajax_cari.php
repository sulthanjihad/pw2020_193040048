<?php
require '../php/functions.php';
$buku = cari($_GET['keyword']);
?>
<?php foreach ($buku as $bk) : ?>
  <div class="cardisi">
    <h1 class="card-title text-dark">Buku Yang Tersedia.</h1>
    <div class="card bg-transparent text-white m-5 border-0">
      <img src="assets/img/<?= $bk["Cover"]; ?>" class="card-img" alt="..." width="250">
      <div class="card-img-overlay">

        <h5 class="card-text mb-5"><a href="php/detail.php?Id=<?= $bk['Id'] ?>" class="alert-link"><?= "$bk[Id]"; ?>.<?= "$bk[NamaBuku]"; ?></a></h5>
        <h5 class="card-text">silahkan tekan untuk lihat lebih detail.</h5>
      </div>
    </div>
  </div>


<?php endforeach; ?>