<?php

    session_start();
    require_once "connectdata.php";

    $connect = @new mysqli($host, $db_user, $db_password, $db_name);

 if ($connect->connect_errno != 0) {
     echo "Error: ".$connect -> connect_errno;
 }

 if(isset($_POST['userMail'])){

    //Tutaj będzie jeszcze jakas walidacja po stronie serwera.



     //hashowanie hasel
    $userpass1 = $_POST['userPassword'];
    $userpass2 = $_POST['userPasswordConf'];
    $hash_pw = password_hash($userPassword, PASSWORD_DEFAULT);

    echo $hash_pw; exit();

 }



?>