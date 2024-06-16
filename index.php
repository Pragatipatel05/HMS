<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT.hub</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
</head>
<body>
    <?php
    include("include/header.php");
    ?>
    <div style="margin-top:10px"> </div>
    <div class="container-fluid">
        <div class = "col-md-12">
            <div class="row"> 
                <div class="col-md-3 mx-3" style="margin-top: 10%; left: 2%;">
                    <div class="row">    
                    <a href="#"><img src="admin\img\png\logo-black.png" style="width: 100%; height: 100%" alt="WELCOME"></a>
                    </div>
                    <h6 class="text-center">We have the hands that care!</h6>
                </div>
                <div class="col-md-3 mx-5 shadow" style="margin-top: 10%; height: 300px;">
                    <div class="row">
                    <img src="img/doc1.jpg" style="width: 100%; height: 220px;">
                    </div>

                    <h5 class="text-center">Trust me I'm a Physio!</h5>
                    <a href="doctorlogin.php" style="margin-left: 40%;">
                        <button class="btn btn-info">Login</button>
                    </a>
                </div>
                <div class="col-md-3 mx-5 shadow" style="margin-top: 10%; height: 300px;"> 
                    <div class="row">    
                    <img src="img/doc2.jpg" style="width: 100%; height: 220px;">
                    </div>
                        <h5 class="text-center">Someday is not a day of the week.</h5>
                        <a href="apply.php">
                        <button class="btn btn-info" style="margin-left:35%;">Apply Now!!</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer" style="position: fixed; text-align: center; bottom: 12px; width: 100%;">
        <i>
        Medicine adds Days to Life, Physical Therapy adds Life to Days &#10084;
</i>
        </div>
    </div>

</body>
</html>