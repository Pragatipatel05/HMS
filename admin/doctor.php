<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Doctors</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png" />
</head>
<body>
    <?php
        include("../include/header.php");
        include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">All Doctors</h5>
                    <?php
                        $query = "SELECT * FROM doctors WHERE status='Approved' ORDER BY date_reg ASC";
                        $res = mysqli_query($connect, $query);


                        $output = "";

$output .= "

    <table class='table table-bordered text-center'>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Hospital</th>
            <th>Mobile Number</th>
            <th>Date Registered</th>
            <th>Action</th>
        </tr>

";


if(mysqli_num_rows($res) < 1){
    $output .= "
        <tr>
        <td colspan='10'>No Request Yet.</td>
        </tr>
    ";
}

while($row = mysqli_fetch_array($res)){
    $output .= "

    <tr>
        <td>".$row['id']."</td>
        <td>".$row['firstname']."</td>
        <td>".$row['lastname']."</td>
        <td>".$row['username']."</td>
        <td>".$row['email']."</td>
        <td>".$row['gender']."</td>
        <td>".$row['hospital']."</td>
        <td>".$row['phone']."</td>
        <td>".$row['date_reg']."</td>
        <td>
            <a href='edit.php?id=".$row['id']."'>
                <button class='btn btn-info'>Edit</button>
            </a>
        </td>
    ";
}

$output .= "

</tr>
</table>";

echo $output;
                ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>