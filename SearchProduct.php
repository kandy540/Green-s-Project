
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
    <style>
    table, th, td {
      border: 1px solid black;
    }
    table {
      border-collapse: collapse;
      empty-cells: show;
      display:
    }
  </style>
  <script src="jquery-3.4.1.min.js"></script>
  <script>
    //ajex in Javascript
		var asyncRequest;

    function getAllProducts() {
      //display all products
      var url = "displayProducts.php";
        try {
          asyncRequest = new XMLHttpRequest();

          asyncRequest.onreadystatechange=stateChange;
          asyncRequest.open('GET',url,true);
          asyncRequest.send();
        }
          catch (exception) {alert("Request failed");}
    }

		function stateChange() {
			if(asyncRequest.readyState==4 && asyncRequest.status==200) {
				document.getElementById("contentArea").innerHTML=
					asyncRequest.responseText;
			}
		}

    function clearPage(){
      document.getElementById("contentArea").innerHTML = "";
    }

    function init(){

      var z3 = document.getElementById("productLink");
      z3.addEventListener("mouseover", getAllProducts);

      var z4 = document.getElementById("productLink");
      z4.addEventListener("mouseout", clearPage);
    }
    document.addEventListener("DOMContentLoaded", init);

    //ajax in jQuery
    $(function(){
      $("#productDropDown").change(function(){
        $.ajax({
          url:"displayProducts.php?id=" + $("#productDropDown").val(),
          async:true,
          success: function(result){
            $("#contentArea").html(result);
          }
        })
      })
    })
	</script>
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
        <h1> Search Products</h1>
        <form>
        <a id="productLink" href="">All Products</a> <br/>
        <label>Product name:</label>
        <input type="text" class="pname-box" placeholder="Product Name" name="PName"><br></br>
        <button type="submit" class="login-btn" name="search">Search Product</button>
        <hr>
        </form>

        <?php
    

            if(isset($_POST['search']))
            {
                require_once("db.php");
                $PName = $_POST['PName'];
                $sql = "SELECT * FROM products2 where PName='$PName'";
                $result = $mydb->query($sql);

                while($row = mysqli_fetch_array($result))
                {
                    ?>

                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Product Description</th>
                                <th>Price($)</th>
                            </tr>
                            <tr>
                                <td><?php echo $row['PID']; ?></td>
                                <td><?php echo $row['PName']; ?></td>
                                <td><?php echo $row['PDescription']; ?></td>
                                <td><?php echo $row['PPrice']; ?></td>
                            </tr>
                        </thead>
                    </table>
                    <?php

                }
            }
        ?>
</body>
</html>
