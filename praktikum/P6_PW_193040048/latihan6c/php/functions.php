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

    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    $conn = koneksi();

    $Cover = htmlspecialchars($data['Cover']);
    $NamaBuku = htmlspecialchars($data['NamaBuku']);
    $Pengarang = htmlspecialchars($data['Pengarang']);
    $Penerbit = htmlspecialchars($data['Penerbit']);
    $Harga = htmlspecialchars($data['Harga']);

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
