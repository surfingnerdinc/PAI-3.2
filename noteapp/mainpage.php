<?php
session_start();

$_SESSION['creds'] = "Logged as:  " . $_SESSION['lname'] . ", " . $_SESSION['fname'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Notes-Manager Pro
    </title>
    <link rel="stylesheet" href="CSS/mainpage.css" />
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
    <h1>Main page after login</h1>




    <script type ="text/javascript" src ="SCRIPTS/counter.js"></script>
</body>

</html>
