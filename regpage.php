<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Notes-Manager Pro
    </title>
    <link rel="stylesheet" href="css/regpage.css"/>
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


    <form id="form" method="POST" action="createacc.php">
        <fieldset>
            <legend>Fill the gaps to create account!</legend>
            <div>
                <label>Your mail</label>
                <input type="mail" id="mail" name="userMail" placeholder="Type here ..." />
            </div>
            <div>
                <label>First name</label>
                <input type="text" id="firstname" name="firstName" placeholder="Type here ..." />
            </div>
            <div>
                <label>Last name</label>
                <input type="text" id="lastname" name="lastName" placeholder="Type here ..." />
            </div>
            <div>
                <label>Password</label>
                <input type="password" id="password" name="userPassword" placeholder="Type here ..." />
            </div>
            <div>
                <label>Repeat pass</label>
                <input type="password" id="passwordconf" name="userPasswordConf" placeholder="Type here ..." />
            </div>
            <div>
                <label>I agree</label>
                <input type="checkbox" name="terms" />
            </div>
            <div>
                <input class="submitbtn" type="submit" value="Click to create account" />
            </div>
        </fieldset>
    </form>
    <script type="text/javascript" src="jsscr/validation.js"> </script>
</body>

</html>