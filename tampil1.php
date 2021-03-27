<?php
session_start();
require 'tambah.php';

if (isset($_POST['submit'])) {
    if (tambahAdmin($_POST)>0) {
        header('Location: tampil.php');
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
    <script src="https://kit.fontawesome.com/64d0628072.js" crossorigin="anonymous"></script>

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
                            <i class="fas fa-1x fa-user-circle me-1"></i>Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="index.php"><i class="fas fa-1x fa-user-circle me-1"></i>User</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Tutup -->

    <!-- buka -->
    <div class="container border border-2 rounded mt-3 shadow p-3 mb-5 bg-body rounded">
        <form action="" method="POST">
            <div class="mb-3 mt-2">
                <label for="exampleInputPassword1" class="form-label">Nama</label>
                <i class="fas fa-1x fa-pen ms-1"></i>
                <input class="form-control" type="text" name="nama" aria-label="default input example">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Harga</label>
                <i class="fas fa-hand-holding-usd"></i>
                <input class="form-control" type="text" name="harga" aria-label="default input example">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Stock</label>
                <i class="fas fa-sort-amount-up-alt"></i> <i class="fas fa-sort-amount-down"></i>
                <input class="form-control" type="text" name="stock" aria-label="default input example">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">gambar</label>
                <i class="fas fa-image"></i> 
                <input class="form-control" type="text" name="gambar" aria-label="default input example">
            </div>

            <div class="mb-3">
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