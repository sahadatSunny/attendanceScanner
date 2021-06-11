<?php

namespace App\utility;

class Sanitizer{

    public static function sanitize($data){

        $userData = $data;

        if(empty($userData['name']) || empty($userData['job']) || empty($userData['hashKey'])){

                $_SESSION['msg'] = "Field can't be empty";
                $_SESSION['msg-type'] = "warning";
                return false;
        }else{
            return $userData;
        }

    }

}