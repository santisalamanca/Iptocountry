<?php
/* File Information>_
+--------------------------------------------------------------------------------------+
| Autor -> Santiago Salamanca                                                          |
| Email -> santiagosalamanca@gmail.com                                                 |
| File  -> iptocountry.php                                                             |
| Goal  -> Get country code and country name / Eg: sv El Salvador                      |
+--------------------------------------------------------------------------------------+
| Version: 1.0 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>  2016  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<|
+--------------------------------------------------------------------------------------+
*/

define('GZtZVdkNUNypFWsRkYyIFbJR0dn5ERZBXSIhHOJNEasRWbWVHZDVjcahFbEJmMSxWSERzZORUWnpUaZdmWYpDea',true);  // Security Layer 1 - Change "GZtZVdkNUNypFWs.....ZdmWYpDea" for more security
include("cfg.php");
 $whos_there=Whosthere($_SERVER['HTTP_REFERER']); 
// if (in_array(strtolower($whos_there), $my_websites)) {                                                   // Security Layer 2 - Prevent calls from external scripts/websites
                                                                                                         // Uncomment when you are calling the file from another page
    // Get IP                                                                                            // If you are testing/calling this file directly keep commented
    // Option 1) $_REQUEST  Eg: $ip=$_REQUEST['ip'];  iptocountry.php?ip=xxx.xxx.xxx.xxx                 
    // Option 2) $_SERVER['REMOTE_ADDR']

    // Eg: Option 1 
    $ip=$_REQUEST['ip'];

    $i = ipaddress_to_uint32($ip);
    $ip_block=strstr($ip, '.', true);
    $ip_to_search = ipaddress_to_uint32($ip);

    if($ip_block>=1 && $ip_block<=255){
       include("countries/$ip_block.php");
       for($i = 0; $i < count($countries); $i++) {
           if($countries[$i][0]<=$ip_to_search && $countries[$i][1]>=$ip_to_search){
              $country_code=strtolower($countries[$i][2]);
              $country_name=$countries[$i][3];
              echo "$country_code $country_name";  // Ideas: echo "<img src='flags/$country_code.png'>";
           }
        }
    }
// }            // Uncomment when you are calling this file from another page

?>