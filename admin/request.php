<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Request</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png" />
</head>
<body>

<?php
    include("../include/header.php");

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
                    <h5 class="text-center my">Applications</h5>
                    <div id="showtable">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            show();
            function show(){
                $.ajax({
                    url:"ajax_request.php",
                    method:"POST",
                    success: function(response){
                        $("#showtable").html(response);
                    }
                });
            }

            $(document).on('click', '.approve', function(){
                
                var id = $(this).attr("id");
                
                $.ajax({
                    url:"ajax_approve.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        show();
                    }
                })
            });

            $(document).on('click', '.reject', function(){
                
                var id = $(this).attr("id");
                
                $.ajax({
                    url:"ajax_reject.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        show();
                    }
                })
            });

        });

        

    </script>
    
</body>
</html>