<?php
    require_once("db.php");

    $Email = "";
    $EPassword = "";
    $FirstName = "";
    $LastName = "";
    $error = false;

    if (isset($_POST["signup"])) {
        if(isset($_POST["Email"])) $Email=$_POST["Email"];
        if(isset($_POST["EPassword_1"])) $EPassword_1=$_POST["EPassword_1"];
        if(isset($_POST["EPassword_2"])) $EPassword_2=$_POST["EPassword_2"];
        if(isset($_POST["FirstName"])) $FirstName=$_POST["FirstName"];
        if(isset($_POST["LastName"])) $LastName=$_POST["LastName"];

        if (!empty($Email) && !empty($EPassword_1) && !empty($EPassword_2) && !empty($FirstName) && !empty($LastName) && ($EPassword_1=$EPassword_2))
        {

            $sql = "insert into employee (Email,EPassword,FirstName,LastName) values('$Email','$EPassword_1','$FirstName','$LastName')";
            $result = $mydb->query($sql);
            Header("Location:afterlogin.php.");
                            
        }
        else {
            $error = true;
        }
    }
?>
   <!--if (isset($_POST["signup"])) {
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
   $EPassword_1 = mysqli_real_escape_string($con, $_POST['EPassword_1']);
   $EPassword_2 = mysqli_real_escape_string($con, $_POST['EPassword_2']);

    if(empty($Email) || empty($EPassword_1) || empty($EPassword_2) || ($EPassword_1!=$EPassword_2))
    {
        $error = true;
    }
    else {
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $error = true;
        }

    }

    if (!$error)
    {
       
       $sql = "insert into employee (Email,EPassword) values('$Email','$EPassword_1')";
       $result = mysqli_query($con,$sql);

       if($result)  {
       session_start();
                $_SESSION["Email"] = $Email;
                $_SESSION["EPassword"] = $EPassword;
                Header("Location:afterlogin.php.");
                }
    
    }
}
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HomePage</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.6.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="jquery-3.4.1.min.js"></script>
    
</head>
<body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="SignUp.php">Sign Up</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          LogIn
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="LogIn.php">Employee LogIn</a>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br>
        <br>
        <br>
        
        

        <div class="Log-in-form">
        <h1> Sign Up</h1>
        <form method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="email" class="input-box" placeholder="Your Email" name="Email" value="<?php if(!empty($Email)) echo $Email; ?>" /><?php if($error && empty($Email)) echo "<span class='errlabel'> Please enter your email</span>";?>
        <input type="password" class="input-box" placeholder="Your Password" name="EPassword_1" value="<?php if(!empty($EPassword_1)) echo $EPassword_1; ?>" /><?php if($error && empty($EPassword_1)) echo "<span class='errlabel'> Please enter your password</span>";?>
        <input type="password" class="input-box" placeholder="Re-type Password" name="EPassword_2" value="<?php if(!empty($EPassword_2)) echo $EPassword_2; ?>" /><?php if($error && empty($EPassword_2)) echo "<span class='errlabel'> Please enter your re-enter password</span>";?>
        <input type="text" class="input-box" placeholder="First Name" name="FirstName" value="<?php if(!empty($FirstName)) echo $FirstName; ?>" /><?php if($error && empty($FirstName)) echo "<span class='errlabel'> Please enter your first name</span>";?>
        <input type="text" class="input-box" placeholder="Last Name" name="LastName" value="<?php if(!empty($LastName)) echo $LastName; ?>" /><?php if($error && empty($LastName)) echo "<span class='errlabel'> Please enter your last name</span>";?>
        <p><span><input type="checkbox"></span> I agree with the terms and sevices</p>
        <button type="submit" class="login-btn" name="signup">Sign Up</button>
        <hr>
        <p class="or">OR</p>
        <p>Already have an account? <a href="LogIn">Log In</a></p>
        </form>
    </div>

</body>
</html>