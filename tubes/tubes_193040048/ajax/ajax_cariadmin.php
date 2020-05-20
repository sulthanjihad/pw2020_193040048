<?php
require '../php/functions.php';
$buku = cari($_GET['keyword']);
?>
 <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="#">#</th>
              <th scope="col">Cover</th>
              <th scope="col">NamaBuku</th>
              <th scope="col">Pengarang</th>
              <th scope="col">Penerbit</th>
              <th scope="col">Harga</th>
              <th scope="col">opsi</th>
            </tr>
          <tbody>

            <?php $i = 1; ?>
            <?php foreach ($buku as $bk) : ?>

              <tr class="text-center">
                <td><?= $i; ?></td>

                <td><img src="../assets/img/<?= $bk['Cover'] ?>" width="250"></td>

                <td><?= $bk['NamaBuku']; ?></td>
                <td><?= $bk['Pengarang']; ?></td>
                <td><?= $bk['Penerbit']; ?>t</td>
                <td><?= $bk['Harga']; ?></td>
                <td>
                  <a href="ubah.php?Id=<?= $bk['Id'] ?>" class="btn btn-info mb-5">Ubah</a>
                  <a href="hapus.php?Id=<?= $bk['Id'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger mt-5">hapus</a></td>
              </tr>

          </tbody>
          <?php $i++; ?>
        <?php endforeach; ?>
      <?php endif; ?>
      </thead>
        </table>