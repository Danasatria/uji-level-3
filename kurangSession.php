<?php
session_start();
if (isset($_GET['session'])) {
    if (isset($_SESSION[$_GET['session']])) {
        if ($_SESSION[$_GET['session']]>1) {
            $_SESSION[$_GET['session']]--;
        }
    } 
}
?>