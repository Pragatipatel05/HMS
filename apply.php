<?php
    include("include/connection.php");

    if(isset($_POST['apply'])){

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
            $error['apply'] = "Enter Firstname";
        }else if(empty($surname)){
            $error['apply'] = "Enter Lastname";
        }else if(empty($username)){
            $error['apply'] = "Enter Username";
        }else if(empty($email)){
            $error['apply'] = "Enter Email Address";
        }else if(empty($phone)){
            $error['apply'] = "Enter Mobile Number";
        }else if(empty($hospital)){
            $error['apply'] = "Enter Hospital Name";
        }else if(empty($password)){
            $error['apply'] = "Enter Password";
        }else if(empty($confirm_password)){
            $error['apply'] = "Enter Confirm Password";
        }else if($confirm_password != $password){
            $error['apply'] = "Password does not match.";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now!</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
</head>
<body>
<?php
    include("include/header.php");
?>

<div style="margin-top:60px"> </div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <!-- <div class="col-md-3">
                </div> -->
                <div class="col-md-4" style="margin-top: 7%">
                <img src="img/doctorlogin.png" style="width: 100%;" alt="DOCTOR">
                </div>
                <div class="col-md-6 jumbotron" style=" margin-top: 5%;left: 20%"> 
                <!-- background: #15d5dd; -->
            
                    <div class="row"> 
                        <div class="row register-left mx-1" style="color: #03045e; display: flex; justify-content: center; align-items: center; "> 
                        <h3>Apply Now!!</h3>
                        </div>
                        <div class="col-sm-6 register-right mx-1" style="left: 25%;">
                            <i class="fa-solid fa-user-doctor fa-6x"></i>
                        </div>
                    </div>
                    <div>
                        <?php echo $show; ?>
                    </div>
                    <form method="post">
                        <div class="form-group" style="color: #03045e">
                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
                        </div>
                        <div class="form-group" style="color: #03045e">
                            <label>Lastname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Lastname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
                        </div>
                        <div class="form-group" style="color: #03045e">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
                        </div>
                        <div class="form-group" style="color: #03045e">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>
                        <div class="form-group" style="color: #03045e">
                            <label>Select Gender</label>

                            <input type="radio" name="gender" value="Male" checked> Male
                            <input type="radio" name="gender" value="Female"> Female

                        </div>
                        <div class="form-group" style="color: #03045e">
                            <label>Mobile Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Mobile Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                        </div>
                        <div class="form-group" style="color: #03045e">
                            <label>Hospital</label>
                            <input type="text" name="hospital" class="form-control" autocomplete="off" placeholder="Hospital Name" value="<?php if(isset($_POST['hospital'])) echo $_POST['hospital']; ?>">
                        </div>
                        <div class="form-group" style="color: #03045e">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Password">
                        </div>
                        <div class="form-group" style="color: #03045e">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
                        </div>
                        <input type="submit" name="apply" class="btn btn-info" value="Apply">

                        <p>Already have an account? <a href="doctorlogin.php">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>