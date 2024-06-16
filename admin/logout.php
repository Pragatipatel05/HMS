<?php
session_start();

if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);

    echo 'Logout Successful.';

    header("Location:../index.php");
}
?>