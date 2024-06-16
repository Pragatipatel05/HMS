<?php
    session_start();
    include("include/connection.php");

    if(isset($_POST['login'])){

        $uname = $_POST['uname'];
        $password = $_POST['pass'];

        $error = array();

        $q = "SELECT * from doctors WHERE username='$uname' AND password='$password'";
        $qq = mysqli_query($connect, $q);

        $row = mysqli_fetch_array($qq);


        if(empty($uname)){
            $error['login'] = "Enter Username";
        }else if(empty($password)){
            $error['login'] = "Enter Password";
        }
        // else if($row['status'] == "Pending"){
        //     $error['login'] = "Please Wait for Admin to Confirm";
        // }else if($row['status'] == "Rejected"){
        //     $error['login'] = "Please Try Again Later";
        // }


        if(count($error) == 0){
            $query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";

            $res = mysqli_query($connect, $query);

            if(mysqli_num_rows($res) == 1){
                echo "<script>alert('Login Successful!')</script>";

                $_SESSION['doctor'] = $uname;

                header("Location:doctor/index.php");
                exit();
            }else{
                echo "<script>alert('Invalid Username or Password')</script>";
            }
        }

    }

    if(isset($error['login'])){

        $l = $error['login'];

        $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
    }else{
        $show = "";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
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
            
                    <div class="row"> 
                        <div class="row register-left mx-1" style="color: #03045e; display: flex; justify-content: center; align-items: center; "> 
                        <h3>Doctors Login</h3>
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
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-success bg-info" value="Login">

                        <p>Don't have an account? <a href="apply.php">Apply here!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>