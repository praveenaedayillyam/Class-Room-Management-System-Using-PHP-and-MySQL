<?php

$mysql_hostname = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $mysql_database = "classroom";
    $db = new mysqli($mysql_hostname, $mysql_user, $mysql_password);
    
    if($db)
    {
    //echo "connected successfully to database";
    }
    
    if(!$db)
    {
    die("Could not connect database");
    }
    $selectdb = mysqli_select_db($db,$mysql_database);
    if(!$selectdb)
    {
       die("Could not select database");
    }
    if($selectdb)
    {
      // echo " selected successfully database";
    }
?>