<?php

include("../include/connection.php");

$id = $_POST['id'];

$query = "DELETE FROM doctors WHERE id='$id'";
mysqli_query($connect, $query);

?>