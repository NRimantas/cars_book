<?php


require_once("../cars_book/data_connection.php");
include '../cars_book/layouts/header.php';


// SELECTING ALL USERS FROM DB
try {

    $showUsers = "SELECT * FROM users";
    $query = $conn->prepare($showUsers);
    $query->execute();
    $usersResult = $query->fetchAll();
} catch (PDOException $e) {
    echo "Select failed: " . $e->getMessage();
}

// CHECKING IF SUBMITTED AND INSERTING NEW USER TO DB

if(isset($_POST['submit'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $license_date=$_POST['license_date'];

    
try{
    $insertUser="INSERT INTO users (first_name, last_name, email, license_date) VALUES ('$first_name', '$last_name', '$email', '$license_date')";
    $insertQuery=$conn->prepare($insertUser);
    $insertQuery->execute();
    if($insertQuery){
        header("Location: http://localhost/php/cars_book/index.php");
    }
}catch(PDOException $e){
    echo "Insert failed: ".$e->getMessage();
}

}


?>
<div class="container-sm">
    <div class="showUsersBox">
        <div class="users">
            <!-- TABLE FOR USERS -->
            <table class="table table-dark table-borderless w-auto mt-5" style="border-radius: 10px;">
                <thead>
                    <tr style="color:gray">

                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">License Date</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Showing all users from DB -->
                        <?php
                        foreach ($usersResult as $user) {
                            echo
                            "<td><a href='../cars_book/views/cars.php?userid=".$user['user_id']."'>" . $user['first_name'] . "</a></td>
                            <td>" . $user['last_name'] . "</td>
                            <td>" . $user['email'] . "</td>
                            <td>" . $user['license_date'] . "</td>
                            ";
                        ?>

                        <!-- Links to delete and update -->
                        <td>
                        <a class="btn btn-outline-info" href="../cars_book/views/user_update.php?userid=<?php echo $user['user_id']; ?>">Update</a>
                        <a class="btn btn-outline-danger" href="../cars_book/scripts/user_delete.php?userid=<?php echo $user['user_id']; ?>">Delete</a>

                    </td>
                    </tr>                   
                <?php
                        }
                ?>
            </table>
        </div>
    </div>
    <!-- ADD NEW USER -->
    <div class="insertUserBox">
        <h3 style="font-weight: bold;">CHECK IN NEW USER</h3>
        <form action="" method="POST">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name">

            <label for="last_name">Last Name</label>
            <input type="text" name="last_name">

            <label for="email">Email</label>
            <input type="text" name="email">

            <label for="date">License Date</label>
            <input type="text" name="license_date">
            
            <label for="submit"></label>
            <input type="submit" value="CHECK IN" class="submit" name="submit">

        </form>
    </div>
</div>






<?php

include '../cars_book/layouts/footer.php';

?>