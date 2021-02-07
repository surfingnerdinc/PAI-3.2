<?php
session_start();
if (!isset($_SESSION['logFlag'])) {
    header('Location: ../index.php');
}

$_SESSION['creds'] = "Logged as:  " . $_SESSION['lname'] . ", " . $_SESSION['fname'];
unset($_SESSION['success']);

$validation = true;

//Updating 
if (empty($_POST['Password']  )|| empty($_POST['Password2'])){

}else{
$password = $_POST['Password'];
$password2 = $_POST['Password2'];
$author = $_SESSION['id'];

if ((strlen($password) < 6) || (strlen($password) > 20)) {
    $validation = false;
    $_SESSION['err_password'] = "Password should be longer than 6 and less than 20 chars";
}

if ($password != $password2) {
    $validation = false;
    $_SESSION['err_password2'] = "Passwords have to be the same";
}

// $pass_hashed = password_hash($password, PASSWORD_DEFAULT); 


require_once "connectdata.php";
mysqli_report(MYSQLI_REPORT_STRICT);

try {

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);


    if ($connection->connect_errno != 0) {
        throw new Exception(mysqli_connect_errno());
    } else {
        //if email is existing in db
        if ($validation == true) {
            $password = hash("sha256",$password);
            if ($connection->query("UPDATE Users SET Password = '$password' WHERE Id = '$author'")) {
                $_SESSION['success'] = "Your password has been successfully changed!";
            } else {
                throw new Exception($connection->error);
            }
        }
        $connection->close();
    }
} catch (Exception $err) {
    echo '<span style="color:red;">"Connection to db unsuccesfull "</span>';
    echo $err;
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Notes-Manager Pro
    </title>
    <link rel="stylesheet" href="CSS/accountpage.css" />
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
    <h1>Account page after login</h1>
    <h1><?php
        if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
        }
        ?></h1>
    <form class="form" method="POST">
        <fieldset>
            <div>
                <label>Current pass</label>
                <input type="text" id="currpassword" name="CurrPassword" placeholder="Type here ..." value="<?php

                                                                                                            if (isset($_SESSION['password'])) {
                                                                                                                echo $_SESSION['password'];
                                                                                                            }
                                                                                                            ?>" />
            </div>
            <div>
                <label>Password</label>
                <input type="password" id="password" name="Password" placeholder="Type here ..." />
                <?php
                if (isset($_SESSION['err_password'])) {
                    echo '<div class="error">' . $_SESSION['err_password'] . '</div>';
                    unset($_SESSION['err_password']);
                }
                ?>
            </div>
            <div>
                <label>Repeat pass</label>
                <input type="password" id="password2" name="Password2" placeholder="Type here ..." />
                <?php
                if (isset($_SESSION['err_password2'])) {
                    echo '<div class="error">' . $_SESSION['err_password2'] . '</div>';
                    unset($_SESSION['err_password2']);
                }
                ?>
            </div>
            <div>
                <input class="submitbtn" type="submit" value="Click to update account" />
            </div>
        </fieldset>
    </form>



    <script type="text/javascript" src="SCRIPTS/counter.js"></script>
</body>

</html>