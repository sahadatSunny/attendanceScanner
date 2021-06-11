<?php
session_start();

include_once ($_SERVER['DOCUMENT_ROOT'].'/attendanceScanner/config.php');

use App\utility\Validator;
use App\utility\Sanitizer;


$employee = [];

if(array_key_exists('employeeList', $_COOKIE)){
    $employee = unserialize($_COOKIE['employeeList']);
}

        if(isset($_POST['submit'])){

            $userData = Sanitizer::sanitize($_POST);

            if($userData){
                $validatedData = Validator::validate($userData);
            }else{
                header('location: addEmployee.php');
                die();
            }

            if($validatedData){
                $employee[] = $validatedData;
            }else{
                header("location: addEmployee.php");
                die();
            }
        

            setcookie('employeeList', serialize($employee), time() + 2592000); // emplyee data will be stored for 30 days at cookies
            

            $_SESSION['msg'] = "New Employee has been created successfully";
            $_SESSION['msg-type'] = "success";

            header('location: addEmployee.php');
            
        }

