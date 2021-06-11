<?php

namespace App\utility;

class Validator{

    public static function validate($data){

        $regex = "/^[a-zA-Z\s]+$/";
        $numOnly = "/^[0-9]+$/";

        $userData = [];
        $userData = $data;


        if(preg_match($regex,$userData['name']) && preg_match($regex,$userData['job']) && preg_match($numOnly,$userData['hashKey'])){

        // if(preg_match($regex, $userData['name']) || preg_match($regex,$userData('job')) || preg_match($numOnly,$userData['hashKey'])){

            $userReturn = $userData;

        }else{
                $_SESSION['msg'] = "<span style='color: red;'>Warning:</span> (1)Use only alphabet in name and job field (2)use only number in ID field";
                $_SESSION['msg-type'] = "danger";
                return false;
        }

        if(strlen($userReturn['name'])>20){
                $_SESSION['msg'] = "Name can't be longer then 20 characters";
                $_SESSION['msg-type'] = "danger";
                return false;
        }else{
                return $userReturn;
        }

        

    }



}