<?php

session_start();


$employee = [];

if(array_key_exists('employeeList', $_COOKIE)){
    $employee = unserialize($_COOKIE['employeeList']);
}

        if(isset($_POST['submit'])){

            if(empty($_POST['name']) || empty($_POST['job']) || empty($_POST['hashKey'])){
                
                $_SESSION['msg'] = "Employee has not been added";
                $_SESSION['msg-type'] = "warning";
                header('location: addEmployee.php');
                die();
            }else{
                $employee[] = $_POST;
            }
        

            setcookie('employeeList', serialize($employee), time() + 2592000); // emplyee data will be stored for 30 days at cookies
            

            $_SESSION['msg'] = "New Employee has been created successfully";
            $_SESSION['msg-type'] = "success";

            header('location: addEmployee.php');
            
        }

