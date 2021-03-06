<?php
include_once 'assets/phpqrcode/qrlib.php';
session_start();

$eList = [];


if(array_key_exists('employeeList',$_COOKIE)){
    $eList = unserialize($_COOKIE['employeeList']);
}

unset($eList['datestmp']);

if(empty($eList)){
  $_SESSION['msg'] = "NO ID card available to downlaod. Please add employee from navbar";
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
    <style>
       
        
        .container-card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

       
        .container-card {
        padding: 20px 20px 40px 20px;
        margin:30px 10px 0 0;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 260px;
        height: 400px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        }

        .name{
          color: #888;
          font-size: 20px;
           font-weight: 500;
           
        }

        .title h3{
          text-align: center;
        }
        
        .container-card .job{
            color: #888;
            font-size: 20px;
            font-weight: 300;
        }
        .top-border{
            border-top: 20px solid #343a40;
        }
        .container .img-holder img{
          border: 5px solid #efaa09;
          width: 130px;
          height: 130px;
          margin: 30px 0 30px 30px;
        }

        .float{
          position:fixed;
          padding: 5px;
          font-size: 20px;
          bottom:40px;
          right:40px;
          background-color:#efaa09;
          color:#FFF;
          border-radius:10px;
          text-align:center;
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }



    </style>
    <title>view ID Card</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="index.php">START SCANNING</a>
        <a class="nav-item nav-link" href="addEmployee.php">ADD EMPLOYEE</a>
      </div>
    </div>
  </nav>


  <div class="container">

      <h3 class="text-center mb-6">Please Select card via checkbox to downlaod</h3>
            <hr>
            <?php
                  if(isset($_SESSION['msg'])){ ?>

                      <div class="alert alert-<?=$_SESSION['msg-type']?>">

                       <?=$_SESSION['msg']?>
                        <?php unset($_SESSION['msg']);?>


                      </div>
            <?php } ?>



              <form action="download.php" method="post">  
                <?php foreach ($eList as $key => $data){ ?>
                            
                            
                            <?php 
                                // $path = 'assets/qrCodes';
                                $fileName = "assets/img/qrCodes/".$key.".png";
                                QRcode::png($data['hashKey'], $fileName, 'L', 10, 2);
                            ?>



                                  <div class="d-inline-flex container-card top-border container-fluid">
                                  
                                      <div class="row">
                                                <div class="col-sm-12 row" style="float: right">
                                                  <input type="checkbox" id="checkItem" name="check[]" value=<?= $key ?>></td>
                                                </div>
                                              
                                              <div class="col-sm-12 title">
                                                  <h3>ID CARD</h3>
                                              </div>
                                            
                                            <div class="container">
                                                <div class="col-sm-12 img-holder">
                                                <img src=<?=$fileName?> alt="qr code">
                                                </div>
                                            </div>
                                                <div class="col-sm-12 row">
                                                  <span class="name col-4">Name:</span><span class="job col-8">  <?=$data['name']?></span>
                                                </div>
                                                <div class="col-sm-12 row">
                                                  <span class="name col-4">Job:</span><span class="job col-8">  <?=$data['job']?></span>
                                                </div>
                                                
                                            
                                      </div>
                                   
                                  </div>

                <?php
                } ?>
              <button type="submit" name="submit" class="float btn">download</button>
              </form> 
              

  </div>

</body>
</html>
