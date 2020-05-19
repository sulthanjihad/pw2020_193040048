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

function tambah($data)
{
    $conn = koneksi();

    // $Cover = htmlspecialchars($data['Cover']);

    $NamaBuku = htmlspecialchars($data['NamaBuku']);
    $Pengarang = htmlspecialchars($data['Pengarang']);
    $Penerbit = htmlspecialchars($data['Penerbit']);
    $Harga = htmlspecialchars($data['Harga']);

    $Cover = upload();

    $query = "INSERT INTO buku
                        VALUES
                        ('','$Cover','$NamaBuku','$Pengarang','$Penerbit','$Harga')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($Id)
{
    $conn = koneksi();

    mysqli_query($conn, "DELETE FROM buku WHERE Id = $Id");


    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    $conn = koneksi();
    $Id =   htmlspecialchars($data['Id']);
    $Cover = htmlspecialchars($data['Cover']);
    $NamaBuku = htmlspecialchars($data['NamaBuku']);
    $Pengarang = htmlspecialchars($data['Pengarang']);
    $Penerbit = htmlspecialchars($data['Penerbit']);
    $Harga = htmlspecialchars($data['Harga']);

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
