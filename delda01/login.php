<?php
include "connection.php";
session_start();
$errorMsg = "";

if(isset($_POST["loginbtn"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $LoginQuery = "SELECT customerID FROM Customer 
                WHERE username = '{$username}' AND password = '{$password}'";
    $loginQueryResult = $conn->query($LoginQuery);
    if($loginQueryResult->num_rows > 0){
        while($row = $loginQueryResult->fetch_assoc()){
            $_SESSION["idSession"] = $row["customerID"];
            header("Location: index.php");
        }
        
    }else{
        $errorMsg = "Incorrect username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
        <h1>Login</h1>
       
        <form method="POST">

            <input type="text" name="username" placeholder="Username" required><br></br>
            <input type="password" name="password" placeholder="Password" required><br></br>
            <input type="submit" name="loginbtn" value="Login">

        </form>
   
    
</body>
</html>