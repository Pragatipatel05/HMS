<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                <div class="col-md-2" style="margin-left: -30px;">

                    <?php
                    include("sidenav.php");
                    ?>

                </div>
                <div class="col-md-10" style="margin-top: 30px;">
                    <h4 class="my-2" style="margin: 15px;"> Admin Dashboard</h4>
                    <div class="col-md-12 my-5">

                        <div class="row">
                            <div class="col-md-3 bg-info mx-4" style="height: 130px;">
                                <div class="col-md-10 my-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                            
                                            <?php
                                                $ad = mysqli_query($connect, "SELECT * 
                                                    FROM admin");

                                                $num = mysqli_num_rows($ad);
                                            ?>

                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <a href="admin.php"><i class="fa-solid fa-user-tie fa-4x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                        
                            </div>

                            <div class="col-md-3 bg-success mx-4" style="height: 130px;">
                            
                                <div class="col-md-10 my-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                                $doctor = mysqli_query($connect, "SELECT * FROM doctors WHERE status='Approved'");
                                                $num2 = mysqli_num_rows($doctor);
                                            ?>

                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <a href="doctor.php"><i class="fa-solid fa-user-doctor fa-4x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>

                        
                            </div>

                            <div class="col-md-3 bg-danger mx-4" style="height: 130px;">
                                
                                <div class="col-md-10 my-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patients</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <a href="patient.php"><i class="fa-solid fa-bed-pulse fa-4x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                        
                            </div>

                            <div class="col-md-3 bg-warning mx-4 my-4" style="height: 130px;">
                                
                                <div class="col-md-10 my-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">My Profile</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <a href="profile.php"><i class="fa-solid fa-circle-user fa-4x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>

                        
                            </div>

                            <div class="col-md-3 bg-secondary mx-4 my-4" style="height: 130px;">
                                <div class="col-md-10 my-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            $req = mysqli_query($connect, "SELECT * FROM doctors WHERE status='Pending'");

                                            $num1 = mysqli_num_rows($req);
                                            
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Applications</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <a href="request.php"><i class="fa-solid fa-envelope-open-text fa-4x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-3 bg-warning mx-4 my-4" style="height: 130px;">    
                                <div class="col-md-10 my-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Income</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <a href="#"><i class="fa-solid fa-money-check-dollar fa-4x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>