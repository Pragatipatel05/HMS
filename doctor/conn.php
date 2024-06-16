<?php
    $conn = mysqli_connect('localhost', 'root', '', 'hospitalmanagementdb');
 
    if(!$conn){
        die("Error: Failed to connect to database!");
    }
    else {
        echo "success";
    }
?>