<?php
/**
 * using mysqli_connect for database connection
 */
 
$databaseHost = 'localhost';
$databaseName = 'pijarcamp';
$databaseUsername = 'root';
$databasePassword = '';
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
 
if ($mysqli){
    $buka = mysqli_select_db($mysqli,$databaseName);
    
    if(!$buka){
        echo "Databased tidak dapat terhubung";
    }
}
else{
    echo" Mysql tidak terhubung";
    }
?>

