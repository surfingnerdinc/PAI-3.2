<?php

        $numer = $_GET['num'];


        $conn = @new mysqli($host, $db_user, $db_password, $db_name);

        try {
            
            $result = $conn->query("DELETE FROM Notatki WHERE id = $numer");
        
            echo "shiiieeeet as fuck";
            echo $numer;
            //header('Location: ../notepage.php');
            $conn ->close();
        
        } catch (Exception $err) {
            echo '<span style="color:red;">"Deleting from db unseccussfully finished"</span>';
            echo $err;
        }
?>