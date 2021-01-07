
<?php 
    /*include('server.php');

    $PID = 0;
    $pname =  "";
    $pdescription = "";
    $pprice = 0.00;
    $update = false;
    
    //delete product
    if (isset($_GET['delete'])){
        $PID = $_GET['delete'];
        $sql = "delete from products where PID=$PID";
        $result = mysqli_query($con,$sql);
    }

    //edit product
    if (isset($_GET['edit'])){
        $PID = $_GET['edit'];
        $sql = "select * from products where PID=$PID";
        $update = true;
        $result = mysqli_query($con,$sql);
            $row = $result->fetch_array();
            $pname = $row['pname'];
            $pdescription = $row['pdescription'];
            $pprice = $row['pprice'];
    }

    //update products
    if (isset($_POST['update'])) {
        $PID = $_POST['PID'];
        $pname = $_POST['pname'];
        $pdescription = $_POST['pdescription'];
        $pprice = $_POST['pprice'];
        
        $sql = "update products set pname='$pname', pdescription='$pdescription', pprice='$pprice' where PID=$PID";
        $result = mysqli_query($con,$sql);
        Header("Location:DMProduct.php.");
    }
    */

    $PID = 0;
    $PName =  "";
    $PDescription = "";
    $PPrice = 0.00;
    $update = false;
    
    //delete product
    if (isset($_GET['delete'])){
        require_once("db.php");
        $PID = $_GET['delete'];
        $sql = "delete from products2 where PID=$PID";
        $result = $mydb->query($sql);
    }

    //edit product
    if (isset($_GET['edit'])){
        require_once("db.php");
        $PID = $_GET['edit'];
        $sql = "select * from products2 where PID=$PID";
        $update = true;
        $result = $mydb->query($sql);
            $row = $result->fetch_array();
            $PName = $row['PName'];
            $PDescription = $row['PDescription'];
            $PPrice = $row['PPrice'];
    }

    //update products
    if (isset($_POST['update'])) {
        require_once("db.php");
        $PID = $_POST['PID'];
        $PName = $_POST['PName'];
        $PDescription = $_POST['PDescription'];
        $PPrice = $_POST['PPrice'];
        
        $sql = "update products2 set PName='$PName', PDescription='$PDescription', PPrice='$PPrice' where PID=$PID";
        $result = $mydb->query($sql);
        Header("Location:DMProduct.php.");
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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
                    <a class="navbar-brand" href="afterlogin.php">Employee's Page</a>
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

    <div class="Delete-product-form">
        <h1> Delete/Modify Products</h1>
        <label>PID:</label>
        <input type="number" class="PID-box" placeholder="Product ID" name="PID" value="<?php echo $PID; ?>"><br></br>
        <label>Product name:</label>
        <input type="text" class="pname-box" placeholder="Product Name" name="PName" value="<?php echo $PName; ?>"><br></br>
        <label>Product description:</label>
        <input type="text" id="pdes" size="50" placeholder="Product description" name="PDescription" value="<?php echo $PDescription; ?>">  
        </textarea><br></br>
        <label>Product price:</label>
        <input type="number" min="0.01" step="0.01" max="2500" class="pprice-box" placeholder="Price" name="PPrice" value="<?php echo $PPrice; ?>"><br></br> 
        <button type="submit" class="login-btn" name="update">Update</button>
        <hr>
        <label>Products:</label>
        <?php 
            require_once('db.php');
            $sql = "select * from products2" or die($mysqli->error);
            $result = $mydb->query($sql);
            //pre_r($result);
            ?>

            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>PID</th>
                            <th>Name</th>
                            <th>Product Description</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['PID']; ?></td>
                        <td><?php echo $row['PName']; ?></td>
                        <td><?php echo $row['PDescription']; ?></td>
                        <td><?php echo $row['PPrice']; ?></td>
                        <td>
                            <a href="DMProduct.php?edit=<?php echo $row['PID']; ?>"
                            class="btn btn-info">Edit</a>
                        <td>
                            <a href="DMProduct.php?delete=<?php echo $row['PID']; ?>"
                            class="btn btn-danger">Delete</a>
                    </tr>
                <?php endwhile; ?>
                </table>
            </div>

        </form>
    </div>
    <br>
        <br>
        <br>
</body>
</html>