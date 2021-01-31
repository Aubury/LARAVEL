<?php
function getIp(){
    foreach (array('HTTP_CLIENT_IP',
                 'HTTP_X_FORWARDED_FOR',
                 'HTTP_X_FORWARDED',
                 'HTTP_X_CLUSTER_CLIENT_IP',
                 'HTTP_FORWARDED_FOR',
                 'HTTP_FORWARDED',
                 'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }


//        if (isset($_SERVER)){
//            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
//            {
//                $ip_addr = $_SERVER["HTTP_X_FORWARDED_FOR"];
//            }
//            elseif (isset($_SERVER["HTTP_CLIENT_IP"]))
//            {
//                $ip_addr = $_SERVER["HTTP_CLIENT_IP"];
//            }
//            else
//            {
//                $ip_addr = $_SERVER["REMOTE_ADDR"];
//            }
//        }
//        else
//        {
//            if ( getenv( 'HTTP_X_FORWARDED_FOR' ) )
//            {
//                $ip_addr = getenv( 'HTTP_X_FORWARDED_FOR' );
//            }
//            elseif ( getenv( 'HTTP_CLIENT_IP' ) )
//            {
//                $ip_addr = getenv( 'HTTP_CLIENT_IP' );
//            }
//            else
//            {
//                $ip_addr = getenv( 'REMOTE_ADDR' );
//            }
//        }
//        return $ip_addr;
}

$ip = getIp();
echo 'IP: '.$ip;
