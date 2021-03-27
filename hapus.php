<?php
    require 'koneksi.php';

    function hapusAdmin($id)
    {
        global $conn;
        $tanggal = date("y/m/d H:i:s");
        $query = "UPDATE stockbarang SET deleted_at='$tanggal'  WHERE id = $id";
    
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
?>