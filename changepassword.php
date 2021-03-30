<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="change_pass.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>CHANGE PASSWORD</h1>
        
        <form action="process_changepassword.php" method="post" id="changepassword_form">
            <div class="tbox">
                <input type="text" placeholder="Old Password" name="pass" value="">
            </div>
            <div class="tbox">
                <input type="text" placeholder="New Password" name="pass2" value="">
            </div>
            <p id="Message" style='color:red; margin-left: 39px;'></p>
        <input class="btn" type="submit" name="changedpass" value="SUBMIT">
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>