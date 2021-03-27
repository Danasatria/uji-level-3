<?php
    require 'koneksi.php';

    function updateAdmin($POST)
    {
        global $conn;
        $id = htmlspecialchars($POST['id']);
        $nama = htmlspecialchars($POST['nama']);
        $stock = htmlspecialchars($POST['stock']);
        $harga = htmlspecialchars($POST['harga']);
        $gambar = htmlspecialchars($POST['gambar']);
    
        $query = "UPDATE stockbarang 
                    SET nama='$nama',stock='$stock',gambar='$gambar',harga='$harga' 
                    WHERE id = $id";
    
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
?>