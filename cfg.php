<?php
/* File Information>_
+--------------------------------------------------------------------------------------+
| Autor -> Santiago Salamanca                                                          |
| Email -> santiagosalamanca@gmail.com                                                 |
| File  -> cfg.php                                                                     |
| Goal  -> Functions                                                                   |
+--------------------------------------------------------------------------------------+
| Version: 1.0 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>  2016  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<|
+--------------------------------------------------------------------------------------+
*/
if(defined('GZtZVdkNUNypFWsRkYyIFbJR0dn5ERZBXSIhHOJNEasRWbWVHZDVjcahFbEJmMSxWSERzZORUWnpUaZdmWYpDea')){

    // Allowed websites (Replace with your websites)
    $my_websites = array('mywebsite1.com','mywebsite2.com','mywebsite3.com');

    // Who's there
    function Whosthere($url){
       $parse=parse_url($url);
       return $parse['host'];
    }

    // IP Convertion
    function ipaddress_to_uint32($ip){
       list($v4,$v3,$v2,$v1) = explode(".", $ip);
       return ($v4*256 *256*256) + ($v3*256*256) + ($v2*256) + ($v1);
    }

} else { include("404.php"); exit; }

?>