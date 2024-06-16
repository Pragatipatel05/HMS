<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png" />
</head>
<body>
    <?php
    include("../include/header.php");
    
    include("../include/connection.php");
    $doc = $_SESSION['doctor'];
    $query = "SELECT * FROM doctors WHERE username='$doc'";
    
    $res = mysqli_query($connect, $query);

    $row_doc = mysqli_fetch_array($res);
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
                    <h4 class="my-2" style="margin: 15px;">Patients List</h4>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                $qry = "SELECT * FROM patients WHERE doctor_username='$doc'";
                                $result = mysqli_query($connect, $qry);

                                $output = "
                                    <table class='table table-bordered'>
                                    <tr>
                                        <th>ID</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Doctor ID</th>
                                        <th>Doctor</th>
                                        <th>Visit No.</th>
                                        <th>Diagnosis</th>
                                        <th>Date Registered</th>
                                        <th style='width: 10%;'>Action</th>
                                    </tr>
                                "; 

                                if(mysqli_num_rows($result) < 1){
                                    $output .= "<tr><td colspan='12' class='text-center'>No New Patients</td></tr>";
                                }

                                while($row = mysqli_fetch_array($result)){
                                    $id = $row['id'];

                                    $output .= "
                                    <tr>
                                        <td>$id</td>
                                        <td>".$row['firstname']."</td>
                                        <td>".$row['lastname']."</td>
                                        <td>".$row['gender']."</td>
                                        <td>".$row['email']."</td>
                                        <td>".$row['phone']."</td>
                                        <td>".$row['doctor_id']."</td>
                                        <td>".$row['doctor']."</td>
                                        <td>".$row['visit_no']."</td>
                                        <td>".$row['diagnosis']."</td>
                                        <td>".$row['date_reg']."</td>
                                        <td>
                                            <a href='patient.php?id=$id'><button id=$id class='btn btn-danger remove'>Remove</button></a>
                                        </td>
                                    </tr>
                                    
                                    ";
                                }

                                $output .= "    
                                </table>
                                ";
                                    echo $output;


                                    if(isset($_GET['id'])){
                                        $id = $_GET['id'];

                                        $qry = "DELETE FROM patients WHERE id= '$id'";

                                        mysqli_query($connect, $qry);

                                    }
                                
                                ?>
                                
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="appointment.php"><button class='btn btn-info'>New Patient</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>
</html>