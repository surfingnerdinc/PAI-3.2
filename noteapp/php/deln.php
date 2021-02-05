<?php

        session_start();
        require_once "connectdata.php";

        $numb = $_SESSION['did'];
        echo $numb;

        try {
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
            
            $result = $conn->query("DELETE FROM Notatki WHERE id = $numb");
            
            
            if($result) {
                $_SESSION['success'] = "Successfully deleted from db, please refresh";
            }


            $conn ->close();
            header('Location: ../notepage.php');
            
        
        } catch (Exception $err) {
            echo '<span style="color:red;">"Deleting from db unseccussfully finished"</span>';
            echo $err;
        }
?>