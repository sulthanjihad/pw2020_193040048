<?php
//function untuk melakukan koneksi ke database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "") or die("koneksi ke db gagal");
    mysqli_select_db($conn, "tubes_193040048") or die("Database salah!");

    return $conn;
}

//function untuk melakukan query ke database
function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload()
{
    $nama_file = $_FILES['Cover']['name'];
    $tipe_file = $_FILES['Cover']['type'];
    $ukuran_file = $_FILES['Cover']['size'];
    $error = $_FILES['Cover']['error'];
    $tmp_file = $_FILES['Cover']['tmp_name'];

    //ketika tidak ada gambar
    if ($error == 4) {
        // echo "<script>
        //     alert('pilih gambar');
        // </script>";

        return 'nophoto.jpg';
    }
    // cek ekstensi file
    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file =  strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $daftar_gambar)) {
        echo "<script>
        alert('bukan gambar ini');
    </script>";
        return false;
    }

    if ($tipe_file != 'image/jpeg' &&  $tipe_file != 'image/png') {
        echo "<script>
        alert('bukan gambar');
    </script>";
        return false;
    }

    // cek ukuran file
    if ($ukuran_file > 5000000) {
        echo "<script>
        alert('terlalu besar');
    </script>";
        return false;
    }

    // siap upload
    $nama_file_baru = uniqid();
    $nama_file_baru .= ".";
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, '../assets/img/' . $nama_file_baru);

    return $nama_file_baru;
}


function tambah($data)
{
    $conn = koneksi();

    // $Cover = htmlspecialchars($data['Cover']);

    $NamaBuku = htmlspecialchars($data['NamaBuku']);
    $Pengarang = htmlspecialchars($data['Pengarang']);
    $Penerbit = htmlspecialchars($data['Penerbit']);
    $Harga = htmlspecialchars($data['Harga']);

    $Cover = upload();
    if (!$Cover) {
        return false;
    }

    $query = "INSERT INTO buku
                        VALUES
                        ('','$Cover','$NamaBuku','$Pengarang','$Penerbit','$Harga')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($Id)
{
    $conn = koneksi();

    //menghapus gambar
    $buku = query("SELECT * FROM buku WHERE Id = $Id");
    if ($buku['Cover'] != 'nophoto.jpg') {
        unlink('../assets/img/' . $buku['Cover']);
    }

    mysqli_query($conn, "DELETE FROM buku WHERE Id = $Id") or die(mysqli_error($conn));


    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    $conn = koneksi();
    $Id =   htmlspecialchars($data['Id']);
    $Cover_lama = htmlspecialchars($data['Cover_lama']);
    $NamaBuku = htmlspecialchars($data['NamaBuku']);
    $Pengarang = htmlspecialchars($data['Pengarang']);
    $Penerbit = htmlspecialchars($data['Penerbit']);
    $Harga = htmlspecialchars($data['Harga']);


    $Cover = upload();
    if (!$Cover) {
        return false;
    }

    if ($Cover == 'nophoto.jpg') {
        $Cover = $Cover_lama;
    }

    $query = "UPDATE buku
            set
            Cover = '$Cover',
            NamaBuku = '$NamaBuku',
            Pengarang = '$Pengarang',
            Penerbit = '$Penerbit',
            Harga = '$Harga'
            WHERE Id = '$Id'
        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function registrasi($data)
{
    $conn = koneksi();
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);

    //cek username sudah ada atau belom
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username sudah digunakan');
        </script>";

        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //TAMBAH USER BARU
    $query_tambah = "INSERT INTO user VALUES('','$username','$password')";
    mysqli_query($conn, $query_tambah);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $conn = koneksi();

    $query = "SELECT * FROM buku
                WHERE 
                Cover LIKE '%$keyword%' OR 
                NamaBuku LIKE '%$keyword%' OR
                Pengarang LIKE '%$keyword%' OR
                Penerbit LIKE '%$keyword%' OR
                Harga LIKE '%$keyword%'

                
                ";
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
