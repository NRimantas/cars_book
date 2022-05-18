<?php
require_once("../data_connection.php");
include '../layouts/header.php';

try{
    $carid=$_GET['car_id'];
        $selectUser="SELECT * FROM cars WHERE car_id='$carid'";
        $query=$conn->prepare($selectUser);
        $query->execute();
        $result=$query->fetch();
        
       
}catch(PDOException $e){
    "Select failed: ".$e->getMessage();
}

?>

<div class="container-sm" style="background-color: rgb(143, 139, 139); height:100vh; margin-top:-60px;">

    <!-- STYLE FOR BOX -->
    <div class="insertUserBox " style="
         position: absolute;
    height: 360px;
    width: 400px;
    background-color: rgb(62, 62, 88);
    text-align: center;
    top: 100px;
    right: 570px;
    color: #ffff;
    border-style: none;
    border-radius: 20px;
    ">
        <h3 style="font-weight: bold;">EDIT YOUR CAR</h3>
        <form action="../scripts/cars_update.php" method="POST">
            <label for="make" style="display: block;">Make</label>
            <input type="text" name="make" value="<?php echo $result['make']; ?>">

            <label for="model" style="display: block;">Model</label>
            <input type="text" name="model" value="<?php echo $result['model']; ?>">

            <label for="plate_no" style="display: block;">Plate_no</label>
            <input type="text" name="plate_no" value="<?php echo $result['plate_no']; ?>">

            <label for="color" style="display: block;">Color</label>
            <input type="text" name="color" value="<?php echo $result['color']; ?>">

            <input type="hidden" name='car_id' value="<?php echo $result['car_id']; ?>">
            <label for="submit" style="display: block; margin-top:10px;"></label>
            <input type="submit" value="CHECK IN" class="submit" name="submit">

        </form>
    </div>
</div>






<?php

include '../layouts/footer.php';

?>