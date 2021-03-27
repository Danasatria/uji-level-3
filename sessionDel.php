<?php 
session_start();
if ($_SESSION[$_GET['session']]) {
    unset($_SESSION[$_GET['session']]);
}
?>