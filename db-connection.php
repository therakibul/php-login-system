<?php 
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "regis";
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$connection){
        die("Can't connect ". mysqli_connect_error());
    }
?>