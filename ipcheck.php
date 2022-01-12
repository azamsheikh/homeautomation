    <?php  
 

date_default_timezone_set("Canada/Atlantic");


$myfile = fopen("ips.txt", "a") or die("Unable to open file!");
$txt = 'User IP Address - '.$_SERVER['REMOTE_ADDR'] ." " .date("Y/m/d:h:i:a") .$tostore;
fwrite($myfile, $txt . "\n");
fclose($myfile);

    
    
    
    

    
    
    
    
    
    
    ?>  