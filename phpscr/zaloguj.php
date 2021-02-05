<?php

 session_start();

 if((!isset($_POST['userName'])) || (!isset($_POST['userPassword']))){
     header('Location: ../index.php');
 }


 require_once "connectdata.php";

 //w przypadku bledu @ nie wyrzuci nam zadnych
 $connect = @new mysqli($host, $db_user, $db_password, $db_name);

 if ($connect->connect_errno != 0) {
     echo "Error: ".$connect -> connect_errno;
 } else {
    $userNa = $_POST['userName'];
    $userPass = $_POST['userPassword'];

    $sql = "SELECT * FROM users WHERE Mail = '$userNa' AND Password = '$userPass'";

    if ($res = @$connect -> query($sql)) {
        $tmpusers = $res -> num_rows;

        if ($tmpusers == 1) {

            $_SESSION['logFlag'] = true;

            $wiersz = $res -> fetch_assoc();
            $_SESSION['fname'] = $wiersz['Fname'];
            $_SESSION['lname'] = $wiersz['Lanme'];
            $_SESSION['id'] = $wiersz['Id'];


            $res -> free_result();


            unset($_SESSION['err']);

            header('Location: ../noteapp/mainpage.php');

        } else {
            $_SESSION['err'] = '<span style ="color:red">Incorrect login or password</span>';
            header('Location: ../loginpage.php');
        }
    $connect -> close();
 }
 }
