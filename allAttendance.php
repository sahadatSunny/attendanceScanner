<?php


if(file_exists('storage.txt')){
    $datas = unserialize(file_get_contents('storage.txt'));
}else{
    echo "Storage not found";
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
        .nav-holder{
            margin: 0 10px 0 10px;
        }
        .nav-right{
            padding: 0 800px 0 0;
        }
        

        /* On mouse-over, add a deeper shadow */
        .container-card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        /* Add some padding inside the card container */
        .container-card {
        padding: 40px 50px;
        margin:30px 10px 0 0;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 260px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        }
        .container a{
            text-decoration: none;
        }
        .container-card span{
            color: #999;
            font-size: 30px;
            font-weight: 500;
        }
        .top-border{
            border-top: 20px solid #343a40;
        }


    </style>
    <title>view employee list</title>
</head>
<body>


<nav class="navbar navbar-expand-lg bg-dark sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

        <div class="navbar-nav nav-holder nav-right">
                <a class="nav-item nav-link btn btn-info" href="index.php">START SCANNING</a>
        </div>

        
            <div class="navbar-nav nav-holder">
                <a class="nav-item nav-link btn btn-outline-warning" href="viewEmployee.php">VIEW EMPLOYEES</a>
            </div>
            <div class="navbar-nav nav-holder">
                <a class="nav-item nav-link btn btn-outline-warning" href="addEmployee.php">ADD EMPLOYEE</a>
            </div>
       

  </div>
</nav>

<div class="container">


<?php

    if($datas){
        
        foreach($datas as $value ){

        foreach($value as $calendar=>$employee){
            ?>
            <a class="card-holder" href="showAttendance.php?calendar=<?=$calendar?>">
                <div class="d-inline-flex container-card top-border">
                    <span><?=$calendar?><span>
                </div>
            </a>



        <?php
        }

        }
    }

?>

</div>


</body>
</html>











