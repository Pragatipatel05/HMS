<?php
session_start();
    include("include/connection.php");

    if(isset($_POST['login'])){

        $username = $_POST['uname'];
        $password = $_POST['pass'];

        $error = array();

        if(empty($username)){
            $error['admin'] = "Enter Username";
        }else if(empty($password)){
            $error['admin'] = "Enter Password";
        }

        if(count($error) == 0){
            $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) == 1){
                echo "<script>alert('SUCCESS!You have Login as Admin')</script>";

                $_SESSION['admin'] = $username;

                header("Location:admin/index.php");
                exit();
            }else{
                echo "<script>alert('Invalid Username or Password')</script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
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
                <div class="col-md-4" style="margin-top: 7%">
                <img src="img/adminlogin.png" style="width: 100%;" alt="ADMIN">
                </div>
                <div class="col-md-6 jumbotron" style="margin-top: 5%;left: 20%">
                    <div class="row" style=""> 
                        <div class="row register-left mx-1" style="color: #03045e; display: flex; justify-content: center; align-items: center; "> 
                        <h3>Admin Login</h3>
                        </div>
                        <div class="col-sm-6 register-right mx-1" style="left: 25%;">
                            <!-- <img src="img/admin-login-1.png" style="height: 170px; width: 170px; "> -->
                            <i class="fa-solid fa-user-gear fa-6x"></i>
                        </div>
                    </div>
                    
                    <form method="post">
                        <div>
                        <?php
                        if(isset($error['admin'])){

                            $sh = $error['admin'];

                            $show = "<h4 class='alert alert-danger'>$sh</h4>";

                        }else{
                            $show = "";
                        }

                        echo $show;

                        ?>

                        </div>
                        <div class="form-group" style="color: #03045e">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                        </div>

                        <input type="submit" name="login" class="btn btn-success bg-info" value="Login">
                    </form>
                </div>
                <!-- <div class="col-md-4"></div> -->
            </div>
        </div>
    </div>

</body>
</html>