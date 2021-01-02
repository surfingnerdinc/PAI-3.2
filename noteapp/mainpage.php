<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Notes-Manager Pro
    </title>
    <link rel="stylesheet" href="css/loginpage.css" />
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="mainpage.php">Main page</a></li>
                <li><a href="notepage.php">Notes</a></li>
                <li><a href="accountpage.php">Account!</a></li>
            </ul>
        </nav>
    </header>
    <h1>Main page after login</h1>

    <?php
    echo "You are logged in as:  " . $_SESSION['db_lastName'] . ", " . $_SESSION['db_firstName'];
    ?>

    <br>
    sesja trwa: TUTAJ WSTAWIĆ LICZNIK.

</body>

</html>
