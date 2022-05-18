<?php 
    require_once ("../data_connection.php");
    
// Deleting car from DB

try{
    $carid=$_GET['car_id'];
    $deleteSql="DELETE FROM cars WHERE car_id=$carid ";
    $query=$conn->prepare($deleteSql);
    $result=$query->execute();
    if($result){
        header("Location: http://localhost/php/cars_book/views/cars.php");
    }
}catch(PDOException $e){
    echo "Delete failed: ".$e->getMessage();
}



?>