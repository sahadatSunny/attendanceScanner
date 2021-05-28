<?php

session_start();


$employee = [];

if(array_key_exists('employeeList', $_COOKIE)){
    $employee = unserialize($_COOKIE['employeeList']);
}



// print_r($employee);
// die();


        if(isset($_POST['submit'])){

            if(empty($_POST['name']) || empty($_POST['job']) || empty($_POST['hashKey'])){
                
                $_SESSION['msg'] = "Employee has not been added";
                $_SESSION['msg-type'] = "warning";
                header('location: addEmployee.php');
                die();
            }else{
                $employee[] = $_POST;
            }
        

            setcookie('employeeList', serialize($employee), time() + 86000);
            

            $_SESSION['msg'] = "New Employee has been created successfully";
            $_SESSION['msg-type'] = "success";

            header('location: addEmployee.php');
            
        }

