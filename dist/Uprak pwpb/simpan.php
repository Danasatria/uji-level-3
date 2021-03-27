<?php
    include 'koneksi.php';
    if(isset($_POST['simpan'])){
        $id = $_POST['id'];
        $nama = $_POST ['nama'];
        $jenis = $_POST['jenis'];
        $alamt = $_POST['alamat'];
        $gambar = $_POST['gambar'];
        
        
        $sql = "INSERT INTO barang (id, nama, jenis, alamat, gambar) VALUES ('$id','$nama','$jenis','$alamat','$gambar')";
        $query =mysqli_query($connect, $sql);

        if ($query){
            header('Location: tables.php');
        }else{
            header('Location: simpan.php?status=gagal');
        }
    }
?>