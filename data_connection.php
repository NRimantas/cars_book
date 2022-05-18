<?php 

// connecting to DB 

$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "cars_book";

try{
    $conn = new PDO("mysql:host=$serverName; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected";
} catch(PDOException $e){
    echo "Connection failed: ".$e->getMessage();
}

?>