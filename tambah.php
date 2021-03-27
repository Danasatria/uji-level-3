<?php
    require 'koneksi.php';

    function tambahAdmin($POST)
    {
        global $conn;
        $nama = htmlspecialchars($POST['nama']);
        $harga = htmlspecialchars($POST['harga']);
        $stock = htmlspecialchars($POST['stock']);
        $gambar = htmlspecialchars($POST['gambar']);
        $query = "INSERT INTO stockbarang VALUES('','$nama',".(int)$harga.",".(int)$stock.",'$gambar',NULL)";
        var_dump($query);
        var_dump(mysqli_query($conn, $query));
        return mysqli_affected_rows($conn);
    }




    
    function bayar($val){
        global $conn;
        foreach ($_SESSION as $key => $value) { 
            $id = explode('.',$key)[1];
            $tanggal = date("y/m/d H:i:s");
            $getData = query("SELECT * FROM stockbarang WHERE id = $id");
            foreach ($getData as $keranjang) {
                if (isset($total)) {
                    $total = $keranjang['harga'] * $value + $total;
                } else {
                    $total = $keranjang['harga'] * $value;
                }
            }
        }
        $ppn = $total * 0.20;
        if ($total > 10000) {
            $discount = $total * 0.10;
            $total = $total + $discount - $ppn;
        }
    
        $JumlahBarang = array_sum($_SESSION);
        $query = "INSERT INTO belibarang VALUES(''," . (int)$JumlahBarang . "," . (int)$total . ",'$tanggal')";
        $a = mysqli_query($conn, $query);
    
        // input order barang
        $beli_id = mysqli_insert_id($conn);
        foreach ($_SESSION as $key => $value) {
            $id_barang = explode('.', $key)[1];
            $order = "INSERT INTO orderbarang VALUES('',".(int)$id_barang.",".(int)$beli_id.",".(int)$value.", '$tanggal')";
            mysqli_query($conn, $order);
        }
        return mysqli_affected_rows($conn);
    }
?>
