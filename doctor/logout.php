<?php
session_start();

if(isset($_SESSION['doctor'])){
    unset($_SESSION['doctor']);

    echo 'Logout Successful.';

    header("Location:../index.php");
}
?>