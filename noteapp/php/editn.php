<?php
        session_start();
        require_once "connectdata.php";

        $title = $_SESSION['title'];
        $content = $_SESSION['Content'];
        $date = date("Y/m/d");
        $numb = $_SESSION['did'];
        echo $numb;

        try {
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
            
            $result = $conn->query("UPDATE Notatki SET Title = 'NOPE', Modified ='$date', Content = '$content' WHERE id = $numb");
            
            
            if($result) {
                $_SESSION['success'] = "Successfully updated in db, please refresh";
            }


            $conn ->close();
            header('Location: ../notepage.php');
            
        
        } catch (Exception $err) {
            echo '<span style="color:red;">"Updating unseccussfully finished"</span>';
            echo $err;
        }
?>