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
            $id = $_POST['id_edycja'];
            $tytul = $_POST['tytul'];
            $tresc = $_POST['tresc'];
            

            if (empty($_POST['tytul'])) {
                $res = $conn->query("SELECT * FROM Notatki WHERE Id = '$id' ");

                while($db_row = $res -> fetch_assoc()) {
                    $tytul = $db_row['Title'];
                    
                }
            }

            if (empty($_POST['tresc'])){
                $res = $conn->query("SELECT * FROM Notatki WHERE Id = '$id' ");

                while($db_row = $res -> fetch_assoc()) {
                    $tresc = $db_row['Content'];
                }
            }

           


            $result = $conn->query("UPDATE Notatki SET Title = '$tytul', Modified ='$date', Content = '$tresc' WHERE id = $id");
            
            
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