<?php
session_start();

$eList = [];

if(array_key_exists('employeeList',$_COOKIE)){
    $eList = unserialize($_COOKIE['employeeList']);
}

unset($eList['datestmp']);


if(empty($eList)){
  $_SESSION['msg'] = "List is empty now please add employee from navbar";
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
    <title>view employee list</title>
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
      <a class="nav-item nav-link" href="qrGen.php">DOWNLOAD ID CARD</a>
    </div>
  </div>
</nav>


<div class="container">

<h1 class="text-center mb-6">Employee list</h1>
            <hr>

            <!-- will alert if emplyee list stay empty -->
            <?php if(isset($_SESSION['msg'])) { ?>
              <div class="alert alert-<?=$_SESSION['msg-type']?>">
                      <?=$_SESSION['msg']."<strong><a style='float: right;text-decoration: none; color: #000;' href='viewEmployee.php'>&times; close </a></strong>"?>
                      <?php unset($_SESSION['msg']); ?>
              </div>
            <?php }?>



                <table class="table" style="margin: auto">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Job Title</th>
                        <th style="padding-left: 50px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($eList as $key => $data){ ?>

                        <tr>
                        <td scope="row"><?= $key ?></td>
                        <td><?= $data['name'] ?> </td>
                        <td><?= $data['job'] ?> </td>
                        <td><a title="See more" style="" class="btn btn-info" href="show.php?position=<?=$key?>">&#8594;</a> <a class="btn btn-outline-warning" href="edit.php?position=<?=$key?>">Edit</a>  <a class="btn btn-outline-danger" href="delet.php?position=<?=$key?>">Delet</a></td>
                        </tr>

                <?php
                } ?>
                
                </tbody>
                </table>

</div>

</body>
</html>
