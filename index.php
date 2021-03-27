<?php
session_start();
require 'tambah.php';
$barang = query('SELECT * FROM stockbarang WHERE deleted_at IS NULL ORDER BY id ASC');

if (isset($_POST['submit'])) {
    if (bayar($_POST) > 0) {
        header('Location: index.php');
        session_destroy();
    } else {
        header('Location: index.php?erorrngab');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/64d0628072.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>WarungAsun</title>
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
                        <a class="nav-link active dropdown-toggle fs-5" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-1x fa-user-circle me-1"></i>User
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="tampil.php"><i class="fas fa-1x fa-user-circle me-1"></i>Admin</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Tutup -->

    <!-- Keranjang -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <select class="form-select w-85 mt-4" aria-label="Default select example">
                    <option selected>Makanan</option>
                    <option value="1">Minuman</option>
                </select>

                <form class="d-flex w-85 mt-3">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success w-15" type="submit"><i class="fas fa-1x fa-search"></i></button>
                </form>

                <div class="boder keranjang mt-2 bg-light w-85">
                    <div class="row" id="keranjang">
                        <?php foreach ($_SESSION as $key => $val) {
                            $getKey = $key;
                            $getID = explode(".", $key)[1];
                            $getData = query("SELECT * FROM stockbarang WHERE id = $getID");
                            foreach ($getData as $keranjang) {
                                if (isset($total)) {
                                    $total = $keranjang['harga'] * $val + $total;
                                } else {
                                    $total = $keranjang['harga'] * $val;
                                }
                        ?>
                                <div class="card barang mt-1 ms-3 shadow p-3 mt-4 bg-body rounded" style="width: 20rem;">
                                    <div class="card-body">
                                        <h4><?= $keranjang['nama'] ?></h4>
                                        <P class="text-danger font-weight-bold"><?= rupiah($keranjang['harga']) ?></P>
                                        <div class="harga">
                                            <p id="jumlah">Quantity :
                                                <i class="fas fa-plus-circle ms-1" onclick="tambahItem('<?= $key ?>')"></i><span> <?= $val ?>
                                                </span><i class="fas fa-minus-square ml-1" onclick="kurangItem('<?= $key ?>')"></i>
                                                <i class="far fa-trash-alt fa-1x float-end" onclick="hapusItem('<?= $key ?>')"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <!-- Tutup keranjang -->

                <!-- total -->
                <table width="100%" class="table-striped mt-2 w-85 shadow-lg p-3 mb-1 bg-body rounded">
                    <tbody>
                        <tr>
                            <td>Discount (10%)</td>
                            <td id="discount">
                                <?php if (isset($total) && $total > 10000) {
                                    $discount = $total * 0.10; ?>
                                    <?= rupiah($discount) ?>
                                <?php } else {
                                    $discount = 0; ?>
                                    Rp 0
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>PPN (10%)</td>
                            <td id="pajak">
                                <?php if (isset($total)) {
                                    $ppn = $total * 00.2; ?>
                                    <?= rupiah($ppn) ?>
                                <?php } else { ?>
                                    Rp 0
                                <?php } ?></td>
                        </tr>
                        <tr class="bg-dark text-white">
                            <td>Total Bayar</td>
                            <td id="totalbayar">
                                <?php if (isset($total)) { ?>
                                    <?= rupiah($total - $discount + $ppn) ?>
                                <?php } else { ?>
                                    Rp 0
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Tutup -->

                <!-- Payment -->
                <form action="" method="POST">
                    <div class="d-flex flex-row">
                        <button type="submit" name="submit" class="btn btn-outline-danger mt-2 w-85 rounded-pill Swal" style="width: 83%;" onclick="Swal.fire({
                        title: 'Sukses',
                        width: 210,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000 
                    })">
                            <h6>Bayar <i class="fas fa-1x fa-wallet"></i></h6>
                        </button>
                </form>

                <a type="button" href="history.php" class="btn btn-outline-success mt-2 w-85 rounded-pill ms-1" style="width: 17%;" data-toggle="modal" data-target="#exampleModal" onclick="bayar()">
                    <i class="fas fa-history fa-1x"></i>
                </a>
            </div>
            <!-- TUTUP -->
        </div>

        <!-- Produk -->
        <div class="col-9">
            <div class="border border-2 mt-4 rounded" id="tempatproduk">
                <div class="row">
                    <?php $i = 1;
                    foreach ($barang as $brg) : ?>
                        <div class="card mb-2 ms-4 me-1 mt-2 drag border shadow p-3 mb-5 bg-body rounded" style="width: 12rem;" onclick="tambahItem('val.<?= $brg['id'] ?>')">
                            <img src="<?= $brg['gambar'] ?>" class="card-img-top mt-1" alt="...">
                            <div class="card-body">
                                <p class="card-title text-truncate title"><?= $brg['nama'] ?></p>
                                <p class="card-text catext text-danger fw-bold"><?= rupiah($brg['harga']) ?></p>
                                <p class="card-text catext fw-light" id="p1">Stock: <span class="text-danger"><?= $brg['stock'] ?></span></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Tutup -->





























    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="js.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>