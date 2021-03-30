<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
    
        <h1>REGISTER</h1>
        
        <form action="process_register.php" method="post" id="register_form">
            <div class="tbox">
                <input type="text" placeholder="First Name" name="fname" value="">
            </div>
            <div class="tbox">
                <input type="text" placeholder="Last Name" name="lname" value="">
            </div>
            <div class="tbox">
                <input type="text" placeholder="Email Address" name="email" value="">
            </div>
            <div class="tbox">
                <input type="password" placeholder="Password" name="pass" value="">
            </div>
            <div class="tbox">
                <input type="text" placeholder="City" name="city" value="">
            </div>
            <div class="tbox">
                <input type="file"  name="image" class="image">
            </div>
            <p id="Message" style='color:red; margin-left: 39px;'></p>
            <div class="response" id="response">
            
        <input class="btn" type="submit" name="register" value="SUBMIT">
        </form>
    </div>
    <script src="script.js"></script> 
</body>
</html>