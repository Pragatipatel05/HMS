<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
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

    if(isset($_POST['add'])){

        $firstname = $_POST['fname'];
        $surname = $_POST['sname'];
        $username = $_POST['uname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $hospital = $_POST['hospital'];
        $password = $_POST['pass'];
        $confirm_password = $_POST['con_pass'];


        $error = array();

        if(empty($firstname)){
            $error['add'] = "Enter Firstname";
        }else if(empty($surname)){
            $error['add'] = "Enter Lastname";
        }else if(empty($username)){
            $error['add'] = "Enter Username";
        }else if(empty($email)){
            $error['add'] = "Enter Email Address";
        }else if(empty($phone)){
            $error['add'] = "Enter Mobile Number";
        }else if(empty($hospital)){
            $error['add'] = "Enter Hospital Name";
        }else if(empty($password)){
            $error['add'] = "Enter Password";
        }else if(empty($confirm_password)){
            $error['add'] = "Enter Confirm Password";
        }else if($confirm_password != $password){
            $error['add'] = "Password does not match.";
        }

        if(count($error) == 0){
            $query = "INSERT INTO doctors(firstname,lastname,username,email,gender,phone,password,hospital,date_reg,status,profile)
             VALUES ('$firstname','$surname','$username','$email','$gender','$phone','$password','$hospital',NOW(),'Pending','doctor.jpg')";

            $result = mysqli_query($connect, $query);
            if($result){
                echo "<script>alert('You have successfully Applied')</script>";

                header("Location: doctorlogin.php");
            }else{
                echo "<script>alert('Failed')</script>";
            }
        }
    }

    if(isset($error['apply'])){
        $s = $error['apply'];

        $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
    }else{
        $show = "";
    }
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
                    <h4 class="my-2" style="margin: 15px;"> New Patient</h4>
                    <div class="col-md-12">
                        <div class="col-md-10 jumbotron" style="margin-top: 2%;left: 0%">
                            <div class="row">
                                <div class="row register-left mx-2" style="color: #03045e; display: flex; justify-content: center; align-items: center; "> 
                                <h3><?php echo $row['hospital']; ?></h3>
                                </div>
                                <div class="col-sm-6 register-right mx-1" style="left: 50%;">
                                <i class="fa-solid fa-hospital fa-3x"></i>
                                </div>
                            </div>
                            <div>
                                <?php echo $show; ?>
                            </div>
                            <form method="post">
                                <div class="form-group" style="color: #03045e">
                                    <label>Patient Name</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                        <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
                                        </div>
                                        <div class="col-md-5">
                                        <input type="text" name="sname" class="form-control" style="display: flex;" autocomplete="off" placeholder="Lastname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="color: #03045e">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Date</label>
                                            <input type="date" name="date" class="form-control" autocomplete="off" placeholder="Date" value="<?php if(isset($_POST['date'])) echo $_POST['date']; ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label>Age</label>
                                            <input type="number" name="age" class="form-control" autocomplete="off" placeholder="Age" value="<?php if(isset($_POST['age'])) echo $_POST['age']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="color: #03045e">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Weight</label>
                                            <input type="text" name="weight" class="form-control" autocomplete="off" placeholder="Weight" value="<?php if(isset($_POST['weight'])) echo $_POST['weight']; ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label>Blood Pressure</label>
                                            <input type="text" name="bp" class="form-control" autocomplete="off" placeholder="Blood Pressure" value="<?php if(isset($_POST['bp'])) echo $_POST['bp']; ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Select Gender</label>
                                    <input type="radio" name="gender" value="Male" checked> Male
                                    <input type="radio" name="gender" value="Female"> Female
                                </div>
                                
                                <div class="form-group" style="color: #03045e">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label>Mobile Number</label>
                                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Mobile Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="color: #03045e">
                                    <label>Doctor Name</label>
                                    <input type="text" name="doct" class="form-control" autocomplete="off" placeholder="Doctor Name" value="<?php if(isset($_POST['doct'])) echo $_POST['doct']; else echo $row['firstname']." ".$row['lastname']; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label>Symptoms</label>
                                    <input type="text" name="symptoms" class="form-control" autocomplete="off" placeholder="Symptoms" value="<?php if(isset($_POST['symptoms'])) echo $_POST['symptoms']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Diagnosis</label>
                                    <input type="text" name="diagnosis" class="form-control" autocomplete="off" placeholder="Diagnosis" value="<?php if(isset($_POST['diagnosis'])) echo $_POST['diagnosis']; ?>">
                                </div>
                                
                                <input type="submit" name="add" class="btn btn-success" style="background-color: #0e1c38;" value="Add Patient">

                            </form>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button class='btn btn-success download-btn'>Download As PDF</button>
                            </div>
                        </div>
                        <script>
                            const downloadBtn = document.querySelector(".download-btn");

                            downloadBtn.addEventListener("click", () => {
                                window.print();
                            });

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>
</html>