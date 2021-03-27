<?php
require 'koneksi.php';
session_start();
if (isset($_GET['session'])) {
    var_dump($_GET['session']);
    $getId = explode('.', $_GET['session'])[1];
    $getStock = query("SELECT stock FROM stockbarang WHERE id = '$getId'")[0];
    if (isset($_SESSION[$_GET['session']])) {
        if ($_SESSION[$_GET['session']] < $getStock['stock']) {
            $_SESSION[$_GET['session']]++;
        }
        
    }else if($getStock['stock']>0)
    {
        $_SESSION[$_GET['session']] = 1;
    }
}
?>