<?php /* include('server.php');

$error = false;


if(isset($_POST['addp']))
{
   $pname = mysqli_real_escape_string($con, $_POST['pname']);
   $pdescription = mysqli_real_escape_string($con, $_POST['pdescription']);
   $pprice = mysqli_real_escape_string($con, $_POST['pprice']);

    if(empty($pname) || empty($pdescription) || empty($pprice))
    {
        $error = true;
    }

    if (!$error)
    {
       
       $sql = "insert into products (pname,pdescription,pprice) values('$pname','$pdescription','$pprice')";
       $result = mysqli_query($con,$sql);

       if($result)  {
       session_start();
            $_SESSION["pname"] = $pname;
            $_SESSION["pdescription"] = $pdescription;
            $_SESSION["pprice"] = $pprice;
            Header("Location:DMProduct.php.");
            }
    
    }
}
*/


$PName = "";
$PDescription = "";
$PPrice = "";
$error = false;

if (isset($_POST["addp"])) {

    if(isset($_POST["PName"])) $PName=$_POST["PName"];
    if(isset($_POST["PDescription"])) $PDescription=$_POST["PDescription"];
    if(isset($_POST["PPrice"])) $PPrice=$_POST["PPrice"];

    if (empty($PName) && empty($PDescription) && empty($PPrice)) {
        $error=true;
    }
        if(!$error) {
        require_once("db.php");
        $sql = "insert into products2(PName, PDescription, PPrice) values('$PName','$PDescription', '$PPrice')";
        $result = $mydb->query($sql);
        Header("Location:DMProduct.php.");
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
                    <a class="navbar-brand" href="#">Employee's Page</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="afterlogin">Home</a></li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Manage Product
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="AddProduct.php">Add Product</a></br>
                          <a class="dropdown-item" href="DMProduct.php">Delete/Edit Product</a></br>
                          <a class="dropdown-item" href="SearchProduct.php">Search Product</a></br>
                          <a class="dropdown-item" href="AnalysisProduct.php">Analysis Product</a></br>
                        </div>
                    </li>
                        <li><a href="index.php" class="logout">logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="Add-product-form">
        <h1> Add Products</h1>
        <form>
        Product name:
        <input type="text" class="pname-box" placeholder="Product Name" name="PName"><br></br>
        Product description:
        <textarea class="pd-box" cols="60" rows="5" placeholder="Product description" name="PDescription" >  
        </textarea><br></br>
        Product price:
        <input type="decimal" min="0.01" step="0.01" max="2500" class="pprice-box" placeholder="Price" name="PPrice" ><br></br>
        <button type="submit" class="login-btn" name="addp">Add Product</button>

        </form>
    </div>
</form>
</body>
</html>

