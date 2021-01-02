<?php
session_start();
if(!isset($_SESSION['logFlag'])){
    header('Location: ../index.php');
}

$_SESSION['creds'] = "Logged as:  " . $_SESSION['db_lastName'] . ", " . $_SESSION['db_firstName'];

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
                <div class ="counter" id="counter"></div>
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



    
    <script type ="text/javascript" src ="SCRIPTS/counter.js"></script>
</body>

</html>