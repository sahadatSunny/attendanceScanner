<?php


if(file_exists('storage.txt')){
    $datas = unserialize(file_get_contents('storage.txt'));
}else{
    echo "Storage not found";
}

if(array_key_exists('calendar',$_GET)){

    $datestmp = $_GET['calendar'];
}





//extrecting individual data from 'storage.txt' file according to user's selected date & storing it in a variable    
    foreach($datas as $data){
        if(array_key_exists($datestmp,$data)){
            $individual = ($data[$datestmp]);
            unset($individual['datestmp']);
        }
    }

?>

<!-- showing individual data in a table -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
       
        .nav-holder{
            margin: 0 20px 0 20px;
        }
        .nav-headline{
            padding: 0 40px 0 40px;
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

                <div class="navbar-nav nav-holder">
                        <a class="nav-item nav-link btn btn-info" href="index.php">START SCANNING</a>
                </div>
                <div class="navbar-nav nav-holder nav-headline">
                        <h3 class="nav-item nav-link mb-6" style="color: #fff;">Showing Attendance of <span style="color: #ffc107"> <?=$datestmp?><span></h3>
                </div>
                <div class="navbar-nav nav-holder">
                    <a class="nav-item nav-link btn btn-outline-warning" href="allAttendance.php">Change Date</a>
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

                <table class="table" style="margin: auto">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Job Title</th>
                        <th>Office check in time</th>
                        <th style="padding-left: 100px;">Office checkout time</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($individual as $key => $data){ ?>

                        <tr>

                            <td scope="row"><?= $key ?></td>
                            <td><?= $data['name'] ?> </td>
                            <td><?= $data['job'] ?> </td>
                            <td><?php if(array_key_exists('time',$data)){
                                echo $data['time'];
                                }?>
                            </td>
                            <td style="padding-left: 100px;"><?php if(array_key_exists('checkout',$data)){
                                echo $data['checkout'];
                                }?>
                            </td>
                        
                        </tr>

                <?php
                } ?>
                
                </tbody>
                </table>

</div>

</body>
</html>
