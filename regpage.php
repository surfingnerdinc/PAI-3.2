<?php

session_start();

if (isset($_POST['Email'])) {
    $validation = true;

    //WALIDACJA

    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $password2 = $_POST['Password2'];
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];



    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false || ($emailB != $email))) {
        $validation = false;
        $_SESSION['err_mail'] = "Incorrect email addr";
    }

    if ((strlen($password) < 6) || (strlen($password) > 20)) {
        $validation = false;
        $_SESSION['err_password'] = "Password should be longer than 6 and less than 20 chars";
    }

    if ($password != $password2) {
        $validation = false;
        $_SESSION['err_password2'] = "Passwords have to be the same";
    }

    // $pass_hashed = password_hash($password, PASSWORD_DEFAULT); 

    if (!isset($_POST['terms'])) {
        $validation = false;
        $_SESSION['err_terms'] = "You have to accept our terms!";
    }


    // remember 

    $_SESSION['rf_email'] = $email;
    $_SESSION['rf_fname'] = $fname;
    $_SESSION['rf_lname'] = $lname;
    $_SESSION['rf_password'] = $password;



    require_once "connectdata.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {

        $connection = @new mysqli($host, $db_user, $db_password, $db_name);


        if ($connection->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            //if email is existing in db

            $res = $connection->query("SELECT Id FROM Users WHERE Mail = '$email'");

            if (!$res) throw new Exception($connection->error);

            $tmp = $res->num_rows;

            if ($tmp != 0) {
                $validation = false;
                $_SESSION['err_mail'] = "Email addr is existing in our db";
            }

            if ($validation == true) {
                if ($connection->query("INSERT INTO users VALUES (NULL, '$fname', '$lname', '$email', '$password')")) {
                    $_SESSION['success'] = true;
                    header('Location: loginpage.php');
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
    <link rel="stylesheet" href="css/regpage.css" />
    <style>
        .error {
            color: red;
            font-size: 12px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Main page</a></li>
                <li><a href="loginpage.php">Log in</a></li>
                <li><a href="regpage.php">Sing in now!</a></li>
            </ul>
        </nav>
    </header>

    <h1>Welcome in Notes Manager Pro</h1>
    <h2>System to manage your notes!</h2>
    <h2>Follow your dreams and write everything you want! </h2>


    <form id="form" method="POST">
        <fieldset>
            <legend>Fill the gaps to create account!</legend>
            <div>
                <label>Your mail</label>
                <input type="email" id="email" name="Email" placeholder="Type here ..." value="<?php

                                                                                                if (isset($_SESSION['rf_email'])) {
                                                                                                    echo $_SESSION['rf_email'];
                                                                                                }
                                                                                                ?>" />
                <?php
                if (isset($_SESSION['err_mail'])) {
                    echo '<div class="error">' . $_SESSION['error_mail'] . '</div>';
                    unset($_SESSION['err_mail']);
                }
                ?>
            </div>
            <div>
                <label>First name</label>
                <input type="text" id="firstname" name="FirstName" placeholder="Type here ..." value="<?php

                                                                                                        if (isset($_SESSION['rf_fname'])) {
                                                                                                            echo $_SESSION['rf_fname'];
                                                                                                        }
                                                                                                        ?>" />
            </div>
            <div>
                <label>Last name</label>
                <input type="text" id="lastname" name="LastName" placeholder="Type here ..." value="<?php

                                                                                                    if (isset($_SESSION['rf_lname'])) {
                                                                                                        echo $_SESSION['rf_lname'];
                                                                                                    }
                                                                                                    ?>" />
            </div>
            <div>
                <label>Password</label>
                <input type="password" id="password" name="Password" placeholder="Type here ..." value="<?php

                                                                                                        if (isset($_SESSION['rf_password'])) {
                                                                                                            echo $_SESSION['rf_password'];
                                                                                                        }
                                                                                                        ?>" />
                <?php
                if (isset($_SESSION['err_password'])) {
                    echo '<div class="error">' . $_SESSION['err_password'] . '</div>';
                    unset($_SESSION['err_password']);
                }
                ?>
            </div>
            <div>
                <label>Repeat pass</label>
                <input type="password" id="passwordconf" name="Password2" placeholder="Type here ..." />
                <?php
                if (isset($_SESSION['err_password2'])) {
                    echo '<div class="error">' . $_SESSION['err_password2'] . '</div>';
                    unset($_SESSION['err_password2']);
                }
                ?>
            </div>
            <div>
                <label> I agree
                    <input type="checkbox" name="terms" />
                </label>
                <?php
                if (isset($_SESSION['err_terms'])) {
                    echo '<div class="error">' . $_SESSION['err_terms'] . '</div>';
                    unset($_SESSION['err_terms']);
                }
                ?>
            </div>
            <div>
                <input class="submitbtn" type="submit" value="Click to create account" />
            </div>
        </fieldset>
    </form>
</body>

</html>