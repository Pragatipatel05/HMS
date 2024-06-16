<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png" />
</head>
<body>
    <?php
        include("../include/header.php");
        include("../include/connection.php");
        $doc = $_SESSION['doctor'];
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
                    <div class="container-fluid">
                        <h4 class="my-2" style="margin: 15px;"> Doctor's Dashboard</h4>
                        <div class="col-md-12 my-5">
                            <div class="row">
                                <div class="col-md-3 mx-4 bg-info" style="height: 150px">
                                    <div class="col-md-10 my-3">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">My Profile</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="profile.php"><i class="fa-solid fa-circle-user fa-4x my-4" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mx-4 bg-success" style="height: 150px">
                                    <div class="col-md-10 my-3">
                                        <div class="row">
                                            <div class="col-md-8">
                                            <?php
                                                $pat = mysqli_query($connect, "SELECT * 
                                                    FROM patients WHERE doctor_username='$doc'");

                                                $num = mysqli_num_rows($pat);
                                            ?>
                                                <h5 class="text-white my-2" style="font-size: 30px;"><?php echo $num; ?></h5>
                                                <h5 class="text-white">Total</h5>
                                                <h5 class="text-white">Patients</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="patient.php"><i class="fa-solid fa-bed-pulse fa-4x my-4" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mx-4 bg-danger" style="height: 150px">
                                    <div class="col-md-10 my-3">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">New Patient</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="appointment.php"><i class="fa-solid fa-user-plus fa-4x my-4" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>