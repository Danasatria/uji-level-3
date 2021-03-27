<?php
session_start();
require 'edit.php';

$id = $_GET['id'];

$barang = query(
    "SELECT * FROM stockbarang WHERE id = $id"
)[0];
if (isset($_POST['submit'])) {
    if (updateAdmin($_POST) > 0) {
        header('Location: tampil.php');
    }else{
        
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>WarungAsun|Admin</title>
</head>

<body>
    <!-- Buka -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="tampil.php">Warung <span class="text-danger">asun</span> | <span class="text-danger">Admin</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle fs-5" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="index.php">User</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Tutup -->

    <!-- buka -->
    <div class="container border border-2 rounded mt-3">
        <form action="" method="POST">
                <input type="text" hidden name="id" value="<?= $barang['id'] ?>">
            <div class="mb-3 mt-2">
                <label for="exampleInputPassword1" class="form-label">Nama</label>
                <input class="form-control shadow-sm p-2 mb-3 bg-body rounded" type="text" name="nama" aria-label="default input example" value="<?= $barang['nama'] ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Harga</label>
                <input class="form-control shadow-sm p-2 mb-3 bg-body rounded" type="text" name="harga" aria-label="default input example" value="<?= $barang['harga'] ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Stock</label>
                <input class="form-control shadow-sm p-2 mb-3 bg-body rounded" type="text" name="stock" aria-label="default input example" value="<?= $barang['stock'] ?>">
            </div>


            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">gambar</label>
                <input class="form-control shadow-sm p-2 mb-3 bg-body rounded" type="text" name="gambar" aria-label="default input example" value="<?= $barang['gambar'] ?>">
            </div>

            <div class="mb-3 me-2">
                <a class="btn btn-outline-danger" href="tampil.php" role="button">Batal</a>
                <button class="btn btn-outline-success ms-2" type="submit" name="submit">Simpan</button>
            </div>
        </form>
    </div>
    <!-- tutup -->






















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>