<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function sendsms($mobile,$message)
{

    $username = "923121431660";
    $password = "4291";
    //$mobile = $phone;
    $sender = "CONSOL";
    
    $url = "http://sendpk.com/api/sms.php?username=".$username."&password=".$password."&mobile=".$mobile."&sender=".urlencode($sender)."&message=".urlencode($message)."";
    
    $ch = curl_init();
    $timeout = 30;
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
    $responce = curl_exec($ch);
    curl_close($ch);
    /*Print Responce*/
    return $responce;

}

?>