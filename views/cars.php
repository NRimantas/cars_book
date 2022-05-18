<?php


require_once("../data_connection.php");
include '../layouts/header.php';


// SELECTING ALL CARS FROM DB where belong to user with id


try {
    $user_id=$_GET['userid'];
    $showCars = "SELECT *
    FROM cars WHERE user_id=$user_id";
    $query = $conn->prepare($showCars);
    $query->execute();
    $result = $query->fetchAll();
    // header("Location: http://localhost/php/cars_book/views/cars.php");   
} catch (PDOException $e) {
    echo "Select failed: " . $e->getMessage();
}

// CHECKING IF SUBMITTED AND INSERTING NEW CAR TO DB
if(isset($_POST['submit'])){
    $make=$_POST['make'];
    $model=$_POST['model'];
    $plate_no=$_POST['plate_no'];
    $color=$_POST['color'];
    $user_id=$_POST['userid'];

    // INSERTING NEW CAR 
try{
    $insertCar="INSERT INTO cars (make, model, plate_no, color, user_id) VALUES ('$make', '$model', '$plate_no', '$color', '$user_id')";
    $insertQuery=$conn->prepare($insertCar);
    
    $carResult=$insertQuery->execute();
    if($carResult){
        header("Location: http://localhost/php/cars_book/views/cars.php");
    }
}catch(PDOException $e){
    echo "Insert failed: ".$e->getMessage();
}

}
?>

<div class="container-sm" style="background-color: rgb(143, 139, 139); height:100vh; margin-top:-60px">
    <div class="showUsersBox">
        <div class="users" style="
            width:100%;
            height:100vh;
            position:relative;
        
        ">
            <!-- TABLE -->
            <table class="table table-dark table-borderless w-auto mt-5" style="position: absolute;">
                <thead>
                    <tr style="color:gray">

                        <th scope="col">Make</th>
                        <th scope="col">Model</th>
                        <th scope="col">Plate_no</th>
                        <th scope="col">Color</th>
                        <th scope="col">User</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Showing all users from DB -->
                        <?php
                        foreach ($result as  $car) {
                            echo
                            "<td>" . $car['make'] . "</td>
                            <td>" . $car['model'] . "</td>
                            <td>" . $car['plate_no'] . "</td>
                            <td>" . $car['color'] . "</td>
                            <td>" . $car['user_id'] . "</td>
                            ";
                        ?>

                        <!-- Links to delete and update -->
                        <td>
                        <a class="btn btn-outline-info" href="../views/car_update.php?car_id=<?php echo $car['car_id']; ?>">Update</a>
                        <a class="btn btn-outline-danger" href="../scripts/car_delete.php?car_id=<?php echo $car['car_id']; ?>">Delete</a>

                    </td>
                    </tr>                   
                <?php
                        }
                ?>
            </table>
        </div>
    </div>

    <div class="insertUserBox " 
    style="
         position: absolute;
    height: 360px;
    width: 400px;
    background-color: rgb(62, 62, 88);
    text-align: center;
    top: 100px;
    right: 200px;
    color: #ffff;
    border-style: none;
    border-radius: 20px;
    ">
        <h3 style="font-weight: bold;">CHECK IN NEW USER</h3>
        <form action="" method="POST">
            <label for="make" style="display: block;">Make</label>
            <input type="text" name="make">

            <label for="model" style="display: block;">Model</label>
            <input type="text" name="model">

            <label for="plate_no" style="display: block;">Plate_no</label>
            <input type="text" name="plate_no">

            <label for="color" style="display: block;">Color</label>
            <input type="text" name="color">

            <!-- <label for="user_id" style="display: block;">User</label>
            <input type="text" name="user_id"> -->
            
            <input type="hidden" name='userid'  value="<?php echo $car['user_id'];?>"> 
            <label for="submit" style="display: block; margin-top:10px;"></label>
            <input type="submit" value="CHECK IN" class="submit" name="submit">

        </form>
    </div>
</div>






<?php

include '../layouts/footer.php';

?>