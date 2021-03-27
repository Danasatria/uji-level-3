<?php
require 'koneksi.php';
$barang = query(
    'SELECT stockbarang.id,
    stockbarang.nama,
    stockbarang.stock AS stockbarang, stockbarang.harga, 
    stockbarang.gambar, 
    SUM(orderbarang.stock) AS belistock FROM stockbarang 
    LEFT JOIN orderbarang ON stockbarang.id = orderbarang.barang_id WHERE stockbarang.deleted_at IS NULL
    GROUP BY stockbarang.id ORDER BY stockbarang.id DESC
'
)

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/64d0628072.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
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
    <div class="container mt-2">
        <a href="tampil1.php"><i class="fas fa-3x fa-plus-circle"></i></a>

    </div>
    <!-- Tutup -->


    <!-- buka -->
    <div class="container mt-3">
        <table class="table table-hover">
            <thead class="table-striped shadow-lg bg-body rounded">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Terjual</th>
                    <th scope="col">Gambar</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody class="shadow bg-body rounded">
                <?php foreach ($barang as $key => $brg) { ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $brg['nama'] ?></td>
                        <td><?= rupiah($brg['harga']) ?></td>
                        <td><?= $brg['stockbarang'] ?></td>
                        <td>
                            <?php if ($brg['belistock'] > 1) { ?>
                                <?= $brg['belistock'] ?>
                            <?php } else { ?>
                                0
                            <?php } ?>
                        </td>
                        <td><img src="<?= $brg['gambar'] ?>" style="width:100px" alt=""></td>
                        <td>
                            <a href="tampiledit.php?id=<?= $brg['id'] ?>" class="badge bg-warning"><i class="fas fa-1x fa-edit text-dark"></i></i></i></a> |
                            <a href="hapus1.php?id=<?= $brg['id'] ?>" class="badge bg-danger"><i class="fas fa-1x fa-trash text-white"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Tutup -->
















































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