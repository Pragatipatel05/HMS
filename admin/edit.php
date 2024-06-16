<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
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
                    <!-- <h5 class="text-center">Edit Doctor</h5> -->
                    <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];

                            $query = "SELECT * FROM doctors WHERE id='$id'";
                            $res = mysqli_query($connect, $query);
                            
                            $row = mysqli_fetch_array($res);

                        }
                    ?>
                    <div class="row">
                        <div class="col-md-10 text-left">
                            <h5 class="text-center">Doctor Details</h5>
                            <h5 class="my-3">ID : <?php echo $row['id']; ?></h5>
                            <h5 class="my-3">Firstname : <?php echo $row['firstname']; ?></h5>
                            <h5 class="my-3">Lastname : <?php echo $row['lastname']; ?></h5>
                            <h5 class="my-3">Username : <?php echo $row['username']; ?></h5>
                            <h5 class="my-3">Gender : <?php echo $row['gender']; ?></h5>
                            <h5 class="my-3">Email : <?php echo $row['email']; ?></h5>
                            <h5 class="my-3">Mobile Number : <?php echo $row['phone']; ?></h5>
                            <h5 class="my-3">Date Registered : <?php echo $row['date_reg']; ?></h5>

                            <button id='<?php echo $row['id']; ?>' class='btn btn-danger remove'>Remove Doctor</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('click', '.remove', function(){
                
                var id = $(this).attr("id");
                
                $.ajax({
                    url:"ajax_remove_doctor.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        alert("Removed doctor");
                        window.location.href = "doctor.php";
                    }
                })
            });

        });

        

    </script>
</body>
</html>