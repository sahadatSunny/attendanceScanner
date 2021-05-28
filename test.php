<?php

date_default_timezone_set("Asia/Dhaka");

$minutes_to_add = 2;

$time = new DateTime(date("Y-m-d h:i"));
$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

$stamp = $time->format('Y-m-d h:i');

echo $stamp;

?>