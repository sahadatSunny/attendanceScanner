<?php

session_start();


if(!array_key_exists('employeeList',$_COOKIE)){
    $_SESSION['attendMsg'] = "Employee List is empty now please add employees to operate";
    $_SESSION['msg-type'] = "warning";
}



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

            <div class="col-6" style="background-color: #343a40">
            
                <div class="col-sm-12">
                    <h3 style="color: #fff">Please show your id in front of scanner to check attendance</h3>
                </div>

                <video id="preview" autoplay class="col-sm-12" style="margin: auto"></video>
                <form method="post" id="formData" action="dateChecker.php">
                
                <input name="qrData" type="text" id="qrData" readonly="" hidden="" placeholder="qr code datas" >
                
                <!-- manual input to chek code with out qr code note: you can't not use cam input while field on -->
                <!-- <div class="form-group col-sm-12">
                    <input name="qrData" type="text" id="qrData" placeholder="can't sacan? input ID only" > 
                    <button type="submit">submit</button>
                </div> -->

                </form>

    
                <div class="form-group col-sm-12">
                    <div class="row">
                        <div class="form-gorup col">
                            <div class="navbar-nav nav-holder">
                                <a class="nav-item nav-link btn btn-outline-warning" href="addEmployee.php">Add new employee</a>
                            </div>
                        </div>
                        <div class="form-gorup col">
                            <div class="navbar-nav nav-holder">
                                <a class="nav-item nav-link btn btn-outline-warning" href="viewEmployee.php">View employee List</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                <div class="row">
                        <div class="form-gorup col">
                            <div class="navbar-nav nav-holder">
                                <a class="nav-item nav-link btn btn-outline-warning" href="attendanceList.php">View Today's Attendance</a>
                            </div>
                        </div>
                        <div class="form-gorup col">
                            <div class="navbar-nav nav-holder">
                                <a class="nav-item nav-link btn btn-outline-warning" href="allAttendance.php">View All History</a>
                            </div>
                        </div>
                    </div>
                </div>

                
                
            
            </div>


            

            <?php

                $style = "border-radius: 10% 30% 40% 90%; background-color: #343a40; color: #000; margin:0 0 0 50px ; padding:50px; font-size:20px; font-weight: 600";

                if(isset($_SESSION['attendMsg'])){ ?>
                
                    <div class="col" style="<?=$style?>">

                        
                        <h3 style="color: #fff">Current <span style="color: #ffc107">Status:</span></h3>
                        <div class="alert alert-<?=$_SESSION['msg-type']?>">
                        <div class="col-sm-8">

                         <?=$_SESSION['attendMsg']?>

                        </div>
                            
                        </div>
                        <a style='float: right;text-decoration: none; color: #fff;margin: 220px 60px 0 0; border: 4px solid #ffc107; border-radius: 100%' href='index.php'><img style="padding: 10px" src="assets/img/close.png"></a>
                    </div>
                </div>

                <?php unset($_SESSION['attendMsg']);?>
            
            <?php } ?>

    </div>

        
</div>
    





    
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
  
    
</body>
</html>
