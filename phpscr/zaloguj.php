<?php

 session_start();
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
            $wiersz = $res -> fetch_assoc();
            $_SESSION['fname'] = $wiersz['Fname'];
            $_SESSION['lname'] = $wiersz['Lanme'];
            $_SESSION['id'] = $wiersz['Author']

            $_SESSION['logFlag'] = true;
            $res -> free_result();

            echo $fname;
            echo $lname;

            header('Location: ../noteapp/mainpage.php');

        } else {
            echo "Logowanie nieudane! ";
        }
    $connect -> close();
 }
 }
