<?php

session_start();
require_once "connectdata.php";




$title = $_POST['noteTitle'];
$content = $_POST['noteContent'];
$author = $_SESSION['id'];
$date = date("Y/m/d");

try {
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    
    $result = $connection -> query ("INSERT INTO `Notatki`(`Title`, `Content`, `Author`) VALUES ('$title', '$content', '$author')");
    $_SESSION['success'] = "Successfully added to db, please refresh";

    $connection -> close();

    header('Location: ../notepage.php');

} catch (Exception $err) {
    echo '<span style="color:red;">"Adding to db unseccussfully finished"</span>';
    echo $err;
}
