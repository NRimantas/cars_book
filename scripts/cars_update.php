
<?php 

require_once("../data_connection.php");

if(isset($_POST['submit'])){
    try{
        $carid=$_POST['car_id'];
        $make=$_POST['make'];
    $model=$_POST['model'];
    $plate_no=$_POST['plate_no'];
    $color=$_POST['color'];
    
        // UPDATING CAR
    $updateSql="UPDATE cars SET make='$make', model='$model', plate_no='$plate_no', color='$color' WHERE car_id='$carid'";
    $query=$conn->prepare($updateSql);
    $result=$query->execute();
    var_dump($result);
    

    if($result){
        header("Location: http://localhost/php/cars_book/views/cars.php");
    }
    }catch(PDOException $e){
        echo "Update failed: ".$e->getMessage();
    }
}else{
    header("Location: http://localhost/php/cars_book/views/cars.php");
}



?>