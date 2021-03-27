<?php
    require 'hapus.php';
$id = $_GET['id'];
if (isset($_GET['id'])) {
    if (hapusAdmin($id) > 0) {
        echo ('halo');
        header('Location: tampil.php');
    } else {
        header('Location: index.php?eror');
    }
}
?>

