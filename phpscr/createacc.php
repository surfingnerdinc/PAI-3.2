<?php

    session_start();
    require_once "connectdata.php";

    $connect = @new mysqli($host, $db_user, $db_password, $db_name);

 if ($connect->connect_errno != 0) {
     echo "Error: ".$connect -> connect_errno;
 }

 



?>