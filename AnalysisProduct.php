<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Analysis</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.6.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="jquery-3.4.1.min.js"></script>
    <script src="https://d3js.org/d3.v5.min.js"></script>

    <script>
        var asyncRequest;

        function stateChange() {
        if(asyncRequest.readyState==4 && asyncRequest.status==200) {
            document.getElementById("contentArea").innerHTML=
            asyncRequest.responseText;
            }
        }
        //ajax in jQuery
        $(function(){
        $("#productDropDown").change(function(){
            $.ajax({
            url:"showProducts.php?PName=" + $("#productDropDown").val(),
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


<div class="Log-in-form" style="margin-bottom: 50px">
    <label> Choose Product: 
        <select name="PName" id="productDropDown">
        
        <?php
        session_start();
        require_once("db.php");
        $sql = "select PName from products";
        $result = $mydb -> query($sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<option value='".$row["PName"]."'>".$row["PName"]."</option>";
        }
        ?>
        </select>
    </label>
    <br><br>
</div>

<div id = "contentArea"></div>

</body>
</html>