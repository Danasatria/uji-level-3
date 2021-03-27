<?php
$server = "localhost";
$user = "root";
$password = "";
$database  = "toko";
$conn = mysqli_connect($server, $user, $password, $database);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $box = [];
    while ($isi = mysqli_fetch_assoc($result)) {
        $box[] = $isi;
    }
    return $box;
}

function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
    }

?>