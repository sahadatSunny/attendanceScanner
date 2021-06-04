<?php

$arr = ['1'=>['aa','bb','cc'],'2'=>['dd','ee','ff'],'3'=>['gg','hh','ii']];

$userdb=Array
(
(0) => Array
    (
        "uid" => '100',
        "aa" => 'Sandra Shush',
        "url" => 'urlof100'
    ),

(1) => Array
    (
        "uid" => '5465',
        "aa"=> 'Stefanie Mcmohn',
        "url" => 'urlof100'
    ),

(2) => Array
    (
        "uid" => '40489',
        "aa" => 'Michael',
        "url" => 'urlof40489'
    )
);

$key = array_search(100, array_column($userdb, 'uid'));

echo $key;