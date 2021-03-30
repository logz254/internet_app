<?php
interface Account
{
    public function register($pdo);
    public function login($pdo);
    public function changePassword($pdo);
    public function logout ($pdo);
    
}
class User implements Account
{
    //member variables

    protected $fName;
    protected $lName;
    protected $email;
    protected $password;
    protected $password2;
    protected $city;
    protected $profilePicUrl;
    protected $_SESSION;

    /*
    camel case
    Used for members of a class
    e.g. protected $fullName;
    snake case
    Used in database connection
    */

    //getters and setters
    //e.g. setEmail and getEmail and so on.

    public function setEmail($Email)
    {
        $this->email=$Email;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setFName($fName)
    {
        $this->fName=$fName;
    }
    public function getFName()
    {
        return $this->fName;
    }
    public function setLName($lName)
    {
        $this->lName=$lName;
    }
    public function getLName()
    {
        return $this->lName;
    }
    public function setPassword($password)
    {
        $this->password=$password;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword2($password2)
    {
        $this->password2=$password2;
    }
    public function getPassword2()
    {
        return $this->password2;
    }
    public function setCity($city)
    {
        $this->city=$city;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function setprofilePicUrl($profilePicUrl)
    {
        $this->profilePicUrl=$profilePicUrl;
    }
    public function getprofilePicUrl()
    {
        return $this->profilePicUrl;
    }
    public function register($pdo)
    {
        include_once 'process_register.php';
        $passwordHash = password_hash($this->getPassword(),PASSWORD_DEFAULT);
        try 
        {
            $stmt = $pdo->prepare ('INSERT INTO `details`(`ID`, `First_Name`, `Last_Name`, `Email_Address`, `Password`, `City`,`Photo`) VALUES (NULL,?,?,?,?,?,?)');
            $stmt->execute([$this->getFName(),$this->getLName(),$this->getEmail(),$passwordHash,$this->getCity(),$this->getprofilePicUrl()]);
            return "Registration Successful";
        } 
        catch (PDOException $e) 
        {            	
            return $e->getMessage();            
        }        
    }
    public function login($pdo)
    {
        try 
        {   
                         
            $stmt = $pdo->prepare("SELECT `Password` FROM `details` WHERE `Email_Address`=?");                
            $stmt->execute([$this->getEmail()]);                
            $row = $stmt->fetch();              
            if($row == null)
            {    
                echo '<script>alert("Invalid Account")</script>';            	
                echo '<script>window.location.href="login.php"</script>';                
            }                
            if (password_verify($this->getPassword(),$row['Password']))
            { 
                
                echo '<script>window.location.href="changepassword.php"</script>';  
                               
            } 
            else
            { 
                echo '<script>alert("Invalid Login Credentials")</script>';              
                echo '<script>window.location.href="login.php"</script>';
            } 
        } 
        catch (PDOException $e) 
        {            	
            return $e->getMessage();            
        }        

    }
    public function changePassword($pdo)
    {
        try 
        {
            include_once 'process_login.php';               
            $stmt = $pdo->prepare("SELECT `Password` FROM `details` where `Email_Address` = '".$_SESSION["email"]."'");
            $stmt->execute();                 
            $row = $stmt->fetch();              
            if(empty($this->getPassword()) ||  empty($this->getPassword2()))
            {
                  echo '<script>alert("Fill in the blanks")</script>';
                  echo '<script>location.href="user_page.php"</script>';
            }
            if($this->getPassword() == $this->getPassword2())
            {
                echo '<script>alert("Passwords do not match")</script>'; 
            }   
            if (password_verify($this->getPassword(),$row['Password']))
            {   
                $passwordHash1 = password_hash($this->getPassword2(),PASSWORD_DEFAULT);
                try 
                {
                    $stmt1 = $pdo->prepare ("UPDATE `details` SET `Password` = '".$passwordHash1."' where `Email_Address` = '".$_SESSION["email"]."'");
                    $stmt1->execute();
                    
                    echo '<script>alert("Password changed successsfully!")</script>';
                    echo '<script>location.href="changepassword.php"</script>';
                } 
                catch (PDOException $e) 
                {            	
                    return $e->getMessage();            
                } 	
                               
            }
            else
            {
                return "Current Password is incorrect!";

            }

            
        } 
        catch (PDOException $e) 
        {            	
            return $e->getMessage();            
        }  
    }
    public function logout ($pdo)
    {

    }
}
?>