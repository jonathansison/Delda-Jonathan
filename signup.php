<?php
include "connection.php";
session_start();
$errorMsg ="";
if(isset($_POST["signbtn"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confpass = $_POST["confpass"];

    $checkQuery = "SELECT username FROM Customer WHERE username = '{$username}'";
    $checkQueryResult = $conn->query($checkQuery);
    if($checkQueryResult->num_rows > 0){
        $errorMsg = "Username already existed";
    }else{
        if ($password == $confpass){
        $signupQuery = "INSERT INTO Customer (name , username , password)
        VALUES ('{$name}', '{$username}', '{$password}')";
        $signupQueryResult =  $conn->query($signupQuery);
        header("Location: login.php");
    }else{
        $errorMsg = "Password do not match";
    }
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>SIGNUP</h1>
    
    <form action="" method="post">


        <input type="text" name="name" placeholder="Name" required><br></br>
        <input type="text" name="username" placeholder="Userame" required><br></br>
        <input type="text" name="password" placeholder="Password" required><br></br>
        <input type="text" name="confpass" placeholder="Confirm Password" required><br></br>
        <input type="submit" name="signbtn" placeholder="SIGN UP">
        

    </form>

</body>
</html>
