<?php

//to recive data from user via form and it will be transformed to processor after chekcing date;

$qrData = null;

if(isset($_POST['qrData'])){
    
    $qrData = $_POST['qrData'];
}

date_default_timezone_set("Asia/Dhaka");
$currentDate = date("Y-m-d");

// $timestmp = '2021-06-04';
// $newDay = date('Y-m-d', strtotime($timestmp));
// $currentDate = $newDay;



$datecontainer = ['datestmp'=>$currentDate]; //to store date in a array form with a key 'datestmp'

$storeEmployee = [];

//to store existing data from storage.txt
if(file_exists('storage.txt')){                                     
    $storeEmployee = unserialize(file_get_contents('storage.txt'));
}else{
    echo "Storage not found";
}

//to store existing data from $_Cookie;
$employee = [];

if(array_key_exists('employeeList', $_COOKIE)){
    $employee = unserialize($_COOKIE['employeeList']);
}

if(array_key_exists('datestmp',$employee)){
    $datestmp = $employee['datestmp'];// reciving date from stored cookie to store it permanently
    
    //date checker operation begains here 

    if($datestmp<$currentDate){  //if one day has been passed the data will store to storage.txt and wipe out 'time' and 'checkout' and set cookie the rest

        $storeEmployee[] = [$datestmp => $employee];
        file_put_contents('storage.txt', serialize($storeEmployee)); // after one day data will be passed to storage.txt
        $employee['datestmp'] = $currentDate; // start a new date in cookie 
        //operation to wipe out exiting cookie data and set new employee data
        $newEmployee = $employee;  
        unset($newEmployee['datestmp']);
            foreach($newEmployee as $key=>$data){
                    unset($data['time']);
                    unset($data['checkout']);
                    $newEmployee[$key] = $data;

                    }     

        $margedarray = array_merge($newEmployee, ['datestmp'=>$currentDate]); //$datecontainer will create a date with a key 'datestmp' on $_Cookie
        setcookie("employeeList", serialize($margedarray), time() + 2592000); //cookie life time 30 days
        //end of the operation of wipping out old attendance data from cookie and set new cookie with name and ....      
        header("location: processor.php?qrData=$qrData");
      

    }else{
        //send data to processor.php via get function
        header("location: processor.php?qrData=$qrData"); // if the day is not finished yet data will be passed to processor.php directly
    
    }
}else{  //if datestamp doesn't exist on cookie data will create a date on employee cookie to identify days

    echo "no starting date is avilable so a new date has been created reload again you will see the date";
    $margedarr = array_merge($employee, $datecontainer); //$datecontainer will create a date with a key 'datestmp' on $_Cookie
    setcookie("employeeList", serialize($margedarr), time() + 2592000); //cooke will be stored for 30 days
    //and send data to processor.php via get function
    header("location: processor.php?qrData=$qrData");
}


