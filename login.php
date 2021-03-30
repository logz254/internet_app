<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>LOG IN</h1>
        
        <form action="process_login.php" method="post" id=login_form>
            <div class="tbox">
                <input type="text" placeholder="Email Address" name="email" value="">
            </div>
            <div class="tbox">
                <input type="password" placeholder="Password" name="pass" value="">
            </div>
            <input class="signin" type="checkbox"id="signin" name="signin" value="signin">
            <p>Keep me signed in</p>
            <input class="btn" type="submit" name="Login" value="LOG IN">
            <p id="Message" style='color:red; margin-left: 39px;'></p>

        </form>
        <a class="b2" href="register.php">CREATE AN ACCOUNT</a>
    </div>
    <script src="script.js"></script>
</body>
</html>