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
    <title>Add new employee</title>
    <style type="text/css">
        .form-container{
            
            padding: 60px;
            align-items: center;
            margin: auto;
        }
        .form-holder{
            background-color: #5f5f5f;
            padding: 50px;

        }

        h3{
            color: #fff;
        }
        form{
            margin: auto;
            color: #fff;
        }
        a{
            text-decoration: none;
            color: #fff;
        }
        .back-btn{
           background-color: #11beaa;
        }

        .gen{
            font-size: 14px;
        }
    </style>
</head>
<body>



    <?php
        if(isset($_SESSION['msg'])){ ?>

            <div class="alert alert-<?=$_SESSION['msg-type']?>">

                <?=$_SESSION['msg']."<strong><a style='float: right;text-decoration: none; color: #000;' href='addEmployee.php'>&times; close </a></strong>"?>
                <?php unset($_SESSION['msg'])?>


            </div>
       
       
    <?php } ?>
    <button class="btn back-btn"><a href="index.php">Start Scanning</a></button>
    <button class="btn back-btn"><a href="viewEmployee.php">View employee list</a></button>

<div class="container">



<div class="form-container col-sm-6">
           
        
    <div class="form-holder col-sm-12">

            <div class="col-sm-12">
                <h3>Add new employee on the list</h3>
            </div>

        <form class="form" action="create.php" method="post">


                                        <label for="name" class="col-sm-6 form-label">Full Name:</label>
                                        <div class="col-sm-12">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    id="name"
                                                    name="name"
                                                    placeholder="Please type employee full name">
                                        </div>
                                        
                                        <label for="job" class="col-sm-6 form-label">Job Title:</label>
                                        <div class="col-sm-12">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    id="job"
                                                    name="job"
                                                    placeholder="Post title">
                                        </div>

                                        <div class="form-group">
                                        <label for="hashKey" class="col-sm-6 form-label">Unique ID:</label>
                                        <div class="col-sm-12">
                                            <input class="col-6"
                                                    type="text"
                                                    class="form-control"
                                                    id="hashKey"
                                                    name="hashKey"
                                                    placeholder="Unique ID">
                                            <a class="col-4 btn btn-outline-warning gen" onclick="uniqueIdGen()">generate ID</a>
                                        </div>
                                        </div>
                                    
                                        <div class="col-sm-12">
                                        <button type="submit" name="submit" class="btn btn-warning">Submit</button>
                                        </div>

                                    

        </form>
    </div>

</div>
</div>


<script>

    let uniqueId =  parseInt(Date.now()/Math.random());

    let hashKey = document.getElementById('hashKey');

    function uniqueIdGen(){
        hashKey.value = uniqueId;
    }
    

   
    console.log(uniqueId);

</script>


    
</body>
</html>