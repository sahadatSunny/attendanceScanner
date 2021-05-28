<?php
date_default_timezone_set("Asia/Dhaka");
session_start();

$eList = [];

$qrData = null;



if(isset($_POST['qrData'])){
    
    $qrData = $_POST['qrData'];
}

if(array_key_exists('employeeList',$_COOKIE)){
    $eList = unserialize($_COOKIE['employeeList']);
}

if(array_key_exists($qrData, $eList)){  //to check employee is listed or not 
    $attend = $eList[$qrData];

    if(array_key_exists('time',$attend)){
        $attendTime = $attend['time']; //to store employee current attendece time if it exits
    

                    //setting interval to pass 2 minute if employee already scanned the id
                    $minutes_to_add = 2;
                    $time = new DateTime($attendTime);
                    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                    $stamp = $time->format('Y-m-d h:i:sa');


                    //employee can't scan ID card twice before interval (in this case 2 minutes ) 

                    if(date("Y-m-d h:i:sa")<$stamp){
                        $_SESSION['attendMsg'] = "You have already checked in your attendance at <p style='color: red'>".$attendTime . "</P> wait until 2 munites to scan agian to checkout";
                        $_SESSION['msg-type'] = "warning";
                        header('location: index.php');
                        die();

                    }else{ // to stamp checkout time on second scan

                        $attendWithTime = ['name'=>$attend['name'],'job'=>$attend['job'],'hashKey'=>$attend['hashKey'],'time'=>$attend['time'],'checkout'=>date("Y-m-d h:i:sa")];
                        $eList[$qrData] = $attendWithTime;
                        setcookie("employeeList", serialize($eList), time() + 86000);
                        $_SESSION['attendMsg'] = "Goodbye Mr. ". $attend['name']." see you again";
                        $_SESSION['msg-type'] = "primary";
                        header('location: index.php');


                        die();


                    }


    }

    $attendWithTime = ['name'=>$attend['name'],'job'=>$attend['job'],'hashKey'=>$attend['hashKey'],'time'=>date("Y-m-d h:i:sa")];
    $eList[$qrData] = $attendWithTime;
    setcookie("employeeList", serialize($eList), time() + 86000);
    
    $name = "Welcome Mr. ".$attend['name'] . "<br>";
    $job = "you are a ".$attend['job'];
    $_SESSION['attendMsg'] = $name.$job;
    $_SESSION['msg-type'] = "success";
    header('location: index.php');
}else{ 
    //If employee is not been added by authority
    $_SESSION['attendMsg'] = "identity faild please connect autority";
    $_SESSION['msg-type'] = "danger";
    header('location: index.php');
}

















// if($qrData === $eList['hashKey']){
//     echo "employee exits";
// }else{
//     echo "unidentified employee";
// }



?>


<br><a href="index.php"><button>scan again</button></a>