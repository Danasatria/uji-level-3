<?php
require 'koneksi.php';
$barang = query(
    'SELECT GROUP_CONCAT(stockbarang.nama) AS nama, 
    GROUP_CONCAT(orderbarang.stock) AS total_stock,
    GROUP_CONCAT(stockbarang.harga) AS harga,
    belibarang.total_harga AS total_harga,
    orderbarang.created_at FROM orderbarang
    INNER JOIN stockbarang ON orderbarang.barang_id = stockbarang.id
    INNER JOIN belibarang ON orderbarang.belibarang_id = belibarang.id
    GROUP BY created_at ORDER BY created_at DESC'
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

    <title>Hello, world!</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="index.php">Warung <span class="text-danger">asun</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link active fs-5" href="#">
                            <i class="fas fa-1x fa-user-circle me-1"></i>User
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Tutup -->
    <div class="container">
        <a href="index.php"><i class="fas fa-3x fa-chevron-circle-left text-dark"></i></a>
    </div>
    <!-- Buka -->
    <div class="container mt-4">
        <table class="table table-hover">
            <thead class="table-striped shadow-lg bg-body rounded">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah harga</th>
                    <th scope="col">Waktu</th>
                </tr>
            </thead>
            <tbody class="shadow bg-body rounded">
                <?php foreach ($barang as $key => $brg) { ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $brg['nama'] ?></td>
                        <td><?= $brg['total_stock'] ?></td>
                        <td>
                            <?php $ex = explode(',', $brg['harga']);
                            $rupiah = [];
                            foreach ($ex as $key => $value) {
                                $rupiah[] = rupiah((int)$value);
                            }
                            echo join(',', $rupiah);
                            ?>
                        </td>
                        <td><?= rupiah($brg['total_harga']) ?></td>
                        <td><?= date('Y/m/d', strtotime($brg['created_at']))?></td>
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