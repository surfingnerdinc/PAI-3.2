<?php
        session_start();
        require_once "connectdata.php";
        header('Location: ../notepaage.php');
        $title = $_SESSION['title'];
        $content = $_SESSION['Content'];
        $date = date("Y/m/d");
        $numb = $_SESSION['did'];
        echo $numb;

        try {
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
            $id = $_POST['id_edycja'];
            $tytul = $_POST['tytul'];
            $tresc = $_POST['tresc'];
            
            $result = $conn->query("UPDATE Notatki SET Title = 'NOPE', Modified ='$date', Content = '$tresc' WHERE id = $id");
            
            
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