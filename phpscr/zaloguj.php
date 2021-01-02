<?php

 require_once "connectdata.php";

 //w przypadku bledu @ nie wyrzuci nam zadnych 
 $connect = @new mysqli($host, $db_user, $db_password, $db_name);

 if ($connect->connect_errno != 0) {
     echo "Error: ".$connect -> connect_errno;
 } else {
    $userNa = $_POST['userName'];
    $userPass = $_POST['userPassword'];

    $sqlquerry = "SELECT * FROM users WHERE userMail = '$userNa' AND userPassword = '$userPass'";

    if ($res = @$connect -> query($sqlquerry)){
        $tmpusers = $res -> num_rows;
        if($tmpusers > 0){
            $wiersz = $res -> fetch_assoc();
            // $mail_tab = $wiersz['userMail'];
            // $name_tab = $wiersz['firstName'];
            // $lname_tab = $wiersz['lastName'];


            /* czyszczenie RAMu - jedna funkcja. */
            //$res -> free();
            //$res -> close();
            $res -> free_result();

            /* 
            mozemy odwolac sie do wierszy tabeli asocjacyjnej poprzez: 
            in e.g. => echo "you are logged as ".$wiersz['lastName'].", ".$wiersz['firstName'];
            */

            //przenoszenie do kolejnej strony: 
            header('Location: ../noteapp/mainpage.php');

        } else {

        }
    }   



    $connect -> close();
 }
?>