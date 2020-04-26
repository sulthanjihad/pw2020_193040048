<?php
  require 'functions.php';

  $Id = $_GET['Id'];
  
  if(hapus($Id) > 0){
    echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'admin.php';
      </script>";
  
    }else{
    echo "<script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'admin.php';
      </script>";
  }
