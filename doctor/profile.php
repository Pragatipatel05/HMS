<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png" />
</head>
<body>
    <?php
    include("../include/header.php");
    
    include("../include/connection.php");
    $doc = $_SESSION['doctor'];
    $query = "SELECT * FROM doctors WHERE username='$doc'";
    
    $res = mysqli_query($connect, $query);

    $row = mysqli_fetch_array($res);
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                
                <div class="col-md-10" style="margin-top: 30px;">
                    <h4 class="my-2" style="margin: 15px;"> <?php echo $row['username']; ?> Profile</h4>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="2" class="text-center">Details</th>
                                    </tr>

                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo $row['firstname']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Lastname</td>
                                        <td><?php echo $row['lastname']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $row['username']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Hospital</td>
                                        <td><?php echo $row['hospital']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Mobile Number</td>
                                        <td><?php echo $row['phone']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Profile Image</td>
                                        <td>
                                            <?php
                                            echo "<img src='img/".$row['profile']."' class='col-md-12' style='height: 250px; width: 250px;'>";
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                                
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="update_profile.php"><button class='btn btn-info'>Update Profile</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>
</html>