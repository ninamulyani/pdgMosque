<?php

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip_user = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip_user = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip_user = $_SERVER['REMOTE_ADDR'];
    }
     return $ip_user;
} 