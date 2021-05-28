<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Employ ettendance</title>
</head>
<body>



<div class="container">
 <div class="row">

            <div class="col-6" style="background-color: #e5e5e5">
            
                <div class="col-sm-12">
                    <h3>Please show your id in front of scanner to check attendance</h3>
                </div>

                <video id="preview" autoplay class="col-sm-12" style="margin: auto"></video>
                <form method="post" id="formData" action="processor.php">
                
                <input name="qrData" type="text" id="qrData" readonly="" hidden="" placeholder="qr code datas" >
                <!-- <input name="qrData" type="text" id="qrData" placeholder="qr code datas" >
                <button type="submit">submit</button> -->

                </form>

                <div class="form-group col-sm-12">
                <button class="btn btn-secondary"><a style="text-decoration: none; color: #fff" href="addEmployee.php">Add new employee</a></button>
                </div>
                <div class="form-gorup col-sm-12">
                <button class="btn btn-secondary"><a  style="text-decoration: none; color: #fff" href="viewEmployee.php">View employee List</a></button>
                </div>
            
            </div>


            

            <?php

                $style = "border-radius: 25px; background-color: #fff; color: #000; margin: auto; padding:50px; font-size:20px; font-weight: 600";

                if(isset($_SESSION['attendMsg'])){ ?>
                    <div class="col">
                        <div class="alert alert-<?=$_SESSION['msg-type']?>">
                        <div class="col-sm-8" style="<?=$style?>">

                         <?=$_SESSION['attendMsg']?>

                        </div>
                            
                        </div>
                        <strong><a style='float: right;text-decoration: none; color: #000;' href='index.php'>&times; close </a></strong>
                    </div>

                <?php unset($_SESSION['attendMsg']);?>
            
            <?php } ?>

    </div>

        
</div>
    





    
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
  
    
</body>
</html>