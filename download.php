<?php
session_start();
$idCards = [];

if(isset($_POST['submit'])){
    $idCards = $_POST['check'];

        $employeeList = [];

        if(array_key_exists('employeeList',$_COOKIE)){
            $employeeList = unserialize($_COOKIE['employeeList']);
        }

        unset($employeeList['datestmp']);


        $eList = [];

        foreach($idCards as $card){
            $eList[] = $employeeList[$card];
        }

}

// if(empty($idCards)){
//     $_SESSION['msg'] = "Please select at least one id card to download";
//     $_SESSION['msg-type'] = "warning";
//     header('location: qrGen.php');
//     die();
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    
    <style>

        .container-card {
        padding: 20px 20px 40px 20px;
        margin:80px 0 80px 1px;
        border: 1px dashed #999;
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
        <a class="nav-item nav-link" href="qrGen.php">DOWNLOAD MORE</a>
      </div>
    </div>
  </nav>


  <div class="container">

      <h1 class="text-center mb-6">Employee list</h1>
            <hr>
                <div id="idCards">    




                <?php 

                    if(!empty($idCards)){
                        
                
                     foreach ($eList as $key => $data){ $fileName = "assets/img/qrCodes/".$key.".png"; ?>
                                

                                    <div class="d-inline-flex container-card top-border container-fluid">
                                    
                                        <div class="row">
                                                
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
                       }

                     }else{
                        $_SESSION['msg'] = "Please select at least one id card to download";
                        $_SESSION['msg-type'] = "warning";
                        header('location: qrGen.php');
                        die();
                     }

                     ?>    
                </div> 
              

  </div>


  <!-- <button onclick="generatePDF()">confirm</button> -->



<script>

        function generatePDF(){

            const idCard = document.getElementById("idCards");
            html2pdf()
            .from(idCard)
            .save();
        }

        generatePDF();
        

</script>




</body>
</html>

