<?php
include "connection.php";
session_start();
$name = "";
$customerid = "";
if(!isset($_SESSION["idSession"])){
  header("Location: login.php");
}

$id = $_SESSION["idSession"];
$retrieveQuery = "SELECT name FROM Customer WHERE customerID = {$id}";
$retrieveQueryResult = $conn->query($retrieveQuery);
if($retrieveQueryResult->num_rows > 0){
  while($row = $retrieveQueryResult->fetch_assoc()){
    $name = $row["name"];

  }
}

if(isset($_POST["Submit"])){
    $name = $_POST["ProductName"];
    $price = $_POST["ProductPrice"];
    $insertQuery = "INSERT INTO Cart (ProductName , ProductPrice , customerID)
                    VALUES ('{$name}','{$price}','{$id}')";
                    $insertQueryResult = $conn->query($insertQuery);

}


if(isset($_POST["logoutbtn"])){
  session_unset();
  session_destroy();  
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
  </head>

  <body>
    <?php include "navbar.php" ?>
    <div class="content">
      <h1>SHOPPING CART</h1>
      <h2>Add Product</h2>

      <form method="POST">
            <label for="ProductName">Product Name: </label>
            <input type="text" name="ProductName" required><br></br>
            <label for="ProductPrice">Product Price: </label>
            <input type="text" name="ProductPrice" required><br></br>
            <input type="submit" name="Submit" value="Add to Cart">

        <input type="submit" name="logoutbtn" value="Logout">

      </form>

  </body>
</html>