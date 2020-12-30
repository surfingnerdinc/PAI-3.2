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
                <li><a href="index.php">Main page</a></li>
                <li><a href="loginpage.php">Log in</a></li>
                <li><a href="regpage.php">Sing in now!</a></li>
            </ul>
        </nav>
    </header>

    <h1>Welcome in Notes Manager Pro</h1>
    <h2>System to manage your notes!</h2>
    <h2>Follow your dreams and write everything you want! </h2>

    <form>
        <fieldset>
            <legend>
                Fill gaps to log in!
            </legend>

            <div>
                <label>User name </label>
                <input type="text" id="username" name="userName" placeholder="Type here..." />
            </div>
            <div>
                <label>Password</label>
                <input type="password" id="password" name="userPassword" placeholder="Type here..." />
            </div>
            <div>
            <input class="submitbtn" type="submit" value="Click to log in!" />
            </div>
        </fieldset>
    </form>

</body>

</html>