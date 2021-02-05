<?php
session_start();
require_once "../phpscr/connectdata.php";

if (!isset($_SESSION['logFlag'])) {
    header('Location: ../index.php');
}

$_SESSION['creds'] = "Logged as:  " . $_SESSION['lname'] . ", " . $_SESSION['fname'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Notes-Manager Pro
    </title>
    <link rel="stylesheet" href="CSS/notepage.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="mainpage.php">Main page</a></li>
                <li><a href="notepage.php">Notes</a></li>
                <li><a href="accountpage.php">Account!</a></li>
                <li><a href="../phpscr/logout.php">Logout!</a></li>
                <div class="counter" id="counter"></div>
                <div class="credentials" id="credentials">
                    <?php
                    echo $_SESSION['creds'];
                    ?>
                </div>
            </ul>
        </nav>
    </header>
    <div id="counter"></div>
    <h1>Note page after login</h1>



    <button class="btn-open" onclick="openForm()">Add note </button>
    <div>
        <form id="my-form" class="popup-form">
            <fieldset>
                <legend>Add note!</legend>
                <label>Title</label>
                <input type="text" id="notetitle" name="noteTitle" placeholder="Title" />
                <label>Content</label>
                <textarea type="text" id="notecontent" name="noteContent" placeholder="Type here...">
        </textarea>
                <button type="submit" class="btn">Add</button>
                <button type="button" class="btn-cancel" onclick="closeForm()">Close</button>
            </fieldset>
    </div>
    </form>

    <h2>Notes:</h2>
    <table class="mytable">
        <tbody>
            <tr>
                <th>Title</th>
                <th>Added on</th>
                <th>Modified on</th>
                <th>Content</th>
            </tr>
            <?php
                $connect = @new mysqli($host, $db_user, $db_password, $db_name);

                if ($connect->connect_errno != 0) {
                    echo "Error: ".$connect -> connect_errno;
                }


                $id = $_SESSION['id'];

                $sqlquerry = "SELECT * FROM notatki WHERE Author = '$id'";

                $res = $connect -> query($sqlquerry);

                if($res -> num_rows > 0){
                    while($db_row = $res -> fetch_assoc()) {
                        echo "</td><td>".$db_row['Title']."</td><td>"
                        .$db_row['Created']."</td><td>".$db_row['Modified']."</td><td>".$db_row['Content']."</td></tr>";
                    }
                }

            ?>
        </tbody>

    </table>
    <div id="rowCounter" class="rowcounter"></div>


    <script type="text/javascript" src="SCRIPTS/counter.js"></script>
    <script type="text/javascript" src="SCRIPTS/addnote.js"></script>
    <script type="text/javascript" src="SCRIPTS/table.js"></script>
</body>

</html>
