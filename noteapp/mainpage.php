<?php
session_start();
if(!isset($_SESSION['logFlag'])){
    header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Notes-Manager Pro
    </title>
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
            </ul>
        </nav>
    </header>
    <div id="counter"></div>
    <h1>Main page after login</h1>

    <?php
    echo "You are logged in as:  " . $_SESSION['db_lastName'] . ", " . $_SESSION['db_firstName'];
    ?>

    <br>
    sesja trwa: TUTAJ WSTAWIĆ LICZNIK.

    <script type ="text/javascript" src ="SCRIPTS/counter.js"></script>
</body>

</html>
