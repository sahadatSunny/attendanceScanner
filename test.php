<?php

date_default_timezone_set("Asia/Dhaka");

$currentDate = date("Y-m-d");

$time = new DateTime(date("Y-m-d"));
$time->add(new DateInterval('P1D'));

$stamp = $time->format('Y-m-d');

echo $currentDate."<br>";
echo $stamp."<br>";



// $minutes_to_add = 2;

// $time = new DateTime(date("Y-m-d h:i"));
// $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

// $stamp = $time->format('Y-m-d h:i');

// echo $stamp;


?>


<?php
// date_default_timezone_set("Asia/Dhaka");

// $currentDay = date('H:i:s');
// echo $currentDay."<br>";

// $timestmp = '00:00:00'; 
// $newDay = date('H:i:s', strtotime($timestmp));
// echo $newDay;

// if($currentDay>=$newDay){
//     echo "it a new day";
// }else{
//     echo "The day has not been finished yet";
// }

