<?php

 session_start();
 require_once "connectdata.php";

 if((!isset($_POST['userName'])) || (!isset($_POST['userPassword']))){
    header('Location: ../index.php');
    exit(); 
 }

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
            $_SESSION['logFlag'] = true;

            $wiersz = $res -> fetch_assoc();
            $_SESSION['id'] = $wiersz['id'];
            $_SESSION['db_userMail'] = $wiersz['userMail'];
            $_SESSION['db_firstName'] = $wiersz['firstName'];
            $_SESSION['db_lastName'] = $wiersz['lastName'];
            // $mail_tab = $wiersz['userMail'];
            // $name_tab = $wiersz['firstName'];
            // $lname_tab = $wiersz['lastName'];


            /* czyszczenie RAMu - jedna funkcja. */
            //$res -> free();
            //$res -> close();
            unset($_SESSION['error']);
            $res -> free_result();

            /* 
            mozemy odwolac sie do wierszy tabeli asocjacyjnej poprzez: 
            in e.g. => echo "you are logged as ".$wiersz['lastName'].", ".$wiersz['firstName'];
            */

            //przenoszenie do kolejnej strony: 
            header('Location: ../noteapp/mainpage.php');

        } else {
            $_SESSION['error'] = 'Incorrect mail or password, please try again!';
            header('Location: ../loginpage.php');  
        }
    }   



    $connect -> close();
 }
?>