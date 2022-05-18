<?php 
    require_once ("../data_connection.php");
    
// Deleting users from DB

try{
    $userid=$_GET['userid'];
    $deleteSql="DELETE FROM users WHERE user_id=$userid ";
    $query=$conn->prepare($deleteSql);
    $result=$query->execute();
    if($result){
        header("Location: http://localhost/php/cars_book/index.php");
    }
}catch(PDOException $e){
    echo "Delete failed: ".$e->getMessage();
}



?>