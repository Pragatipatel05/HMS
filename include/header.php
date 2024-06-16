<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <nav class="navbar navbar-expand-lg navbar-info bg-info">
    <h3 class="text-white bold" style="font-size:5rem;">PT.hub</h3>

    <div class="mr-auto"> </div>
    <ul class="navbar-nav">
        <?php

        if(isset($_SESSION['admin'])){

          $user = $_SESSION['admin'];
          echo'
          <li class="nav-item"><a href="../admin/index.php" class="nav-link active text-white"><h6>'.$user.'</h6></a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link text-white"><h6>Logout</h6></a></li>
          ';

        }else if(isset($_SESSION['doctor'])){

          $user = $_SESSION['doctor'];
          echo'
          <li class="nav-item"><a href="../doctor/index.php" class="nav-link active text-white"><h6>'.$user.'</h6></a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link text-white"><h6>Logout</h6></a></li>
          ';
        }
        else{
          
        echo '
          
        <li class="nav-item"><a href="index.php" class="nav-link active text-white"><h6>Home</h6></a></li>
        <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white"><h6>Admin</h6></a></li>
        <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white"><h6>Doctor</h6></a></li>
          
          ';
        }

        ?>
    </ul>

</nav>

</body>
</html>