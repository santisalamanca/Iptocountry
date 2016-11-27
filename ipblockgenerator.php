<?php
/* File Information>_
+--------------------------------------------------------------------------------------+
| Autor -> Santiago Salamanca                                                          |
| Email -> santiagosalamanca@gmail.com                                                 |
| File  -> ipblockgenerator.php                                                        |
| Goal  -> Generate files for Ip Blocks                                                |
+--------------------------------------------------------------------------------------+
| Version: 1.0 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>  2016  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<|
+--------------------------------------------------------------------------------------+
*/

set_time_limit(0);

$fd = fopen("GeoIPCountryWhois.csv", "r");
$content="";
$counter=1;

$content .="<?php\r\n";
$content .="$"."countries = array(\r\n";
while (($data = fgetcsv($fd, 1024, ",")) !== FALSE)
{
   $ip_count=strstr($data[0], '.', true);
   if($ip_count==$counter){
      $content .="array(".$data[2].",".$data[3].",\"".$data[4]."\",\"".$data[5]."\"),\r\n";
   }
   else  {
           $content .=");\r\n";
           $content .="?>\r\n";
           file_put_contents("countries/$counter.php", $content);
           $counter=$counter+1;
           $content="";
           $content .="<?php\r\n";
           $content .="$"."countries = array(\r\n";
           $content .="array(".$data[2].",".$data[3].",\"".$data[4]."\",\"".$data[5]."\"),\r\n";
          }
}
$content .=");\r\n";
$content .="?>\r\n";
file_put_contents("countries/$ip_count.php", $content); 
fclose($fd);
?>