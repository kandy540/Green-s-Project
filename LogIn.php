<?php
    $Email = "";
    $EPassword = "";
    $error = false;
    $loginOK = null;

    if (isset($_POST["login"]))    {
        if(isset($_POST["Email"])) $Email=$_POST["Email"];
        if(isset($_POST["EPassword"])) $EPassword=$_POST["EPassword"];
        if(empty($Email) || empty($EPassword)) {
            $error=true;
        }
    
        if(!$error) {
            require_once("db.php");
            $sql = "select EPassword from employee where Email='$Email'";
            $result = $mydb->query($sql);

            $row=mysqli_fetch_array($result);
            if ($row){
                if(strcmp($EPassword, $row["EPassword"]) ==0 ) {
                    $loginOK=true;
                } else {
                    $loginOk=false;
                }
            }
            if($loginOK) {
                session_start();
                $_SESSION["Email"] = $Email;
                $_SESSION["EPassword"] = $EPassword;
                Header("Location:afterlogin.php.");
                }
            }
        }
 
?>

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
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
                    <a class="navbar-brand" href="#">Log-In</a>
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
                          <a class="dropdown-item" href="SignUp.php">Sign Up</a>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="Log-in-form">
        <h1> Log In</h1>
        <input type="email" class="input-box" placeholder="Your Email" name="Email" value="<?php if(!empty($Email)) echo $Email; ?>" /><?php if($error && empty($Email)) echo "<span class='errlabel'> Please enter your email</span>";?>
        <input type="password" class="input-box" placeholder="Your Password" name="EPassword" value="<?php if(!empty($EPassword)) echo $EPassword; ?>" /><?php if($error && empty($EPassword)) echo "<span class='errlabel'> Please enter your password</span>";?>
        <p><span><input type="checkbox"></span> Remember me</p>
        <?php if(isset($_POST["employee"]) && ($loginOK==false) || $error) echo "<span class='errlabel'>Email and the password does not match</span>";?>
        <button type="submit" class="login-btn" name="login">Log In</button>
        <hr>
        <p class="or">OR</p>
        <p>Don't have an account? <a href="SignUp">Sign Up</a></p>

        </form>
    </div>
 </header>
</form>
</body>
</html>
