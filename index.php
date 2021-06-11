<?php

session_start();


if(!array_key_exists('employeeList',$_COOKIE)){
    $_SESSION['attendMsg'] = "Employee List is empty now please add employees to operate";
    $_SESSION['help-txt'] = "<p>". file_get_contents('help.txt')."</p>";
    $_SESSION['msg-type'] = "primary";
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

                $style = "background-color: #343a40; color: #000; margin:0 0 0 50px ; padding:50px; font-size:20px; font-weight: 600";

              if(isset($_SESSION['attendMsg'])){ ?>
                
                <div class="col" style="<?=$style?>">

                        
                        <h3 style="color: #fff">Current <span style="color: #ffc107">Status:</span></h3>
                        <div class="alert alert-<?=$_SESSION['msg-type']?>">
                            <div class="col-sm-8">

                            <?=$_SESSION['attendMsg']?>

                        

                            </div>
                        </div>
                        <a style='float: right;text-decoration: none;' href='index.php'><img width="60%" src="assets/img/close.png"></a>
                    </div>

                    <!-- accordion -->
                    
                    <div class="accordion col-sm-12" id="accordionExample">
    
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                               <button class="accordion-button collapsed btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                   Learn how to use
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                    <div><?=$_SESSION['help-txt']?></div>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php unset($_SESSION['attendMsg']);?>
            
            <?php } ?>

    </div>

        
</div>









    



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
  
    
</body>
</html>
