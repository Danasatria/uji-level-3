<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    header('Location: tables.php');
}
    $id = $_GET['id'];
    
    $sql = "DELETE FROM barang WHERE id ='$id'";
    
    $query = mysqli_query($connect, $sql);
    
    if($query){
        header('Location: tables.php');
    }else{
        header('Location: hapus.php?status=gagal');
    }