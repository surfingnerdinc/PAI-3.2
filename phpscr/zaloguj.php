<?php

 require_once "connectdata.php";

 //w przypadku bledu @ nie wyrzuci nam zadnych 
 $connect = @new mysqli($host, $db_user, $db_password, $db_name);

 if ($connect->connect_errno != 0) {
     echo "Error: ".$connect -> connect_errno;
 } else {
    $userNa = $_POST['userName'];
    $userPass = $_POST['userPassword'];

    echo "it works";

    $connect -> close();
 }
?>