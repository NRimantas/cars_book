<?php 
    require_once("../data_connection.php");
// SELECTING ALL USERS FROM DB
try{
    $userid=$_GET['userid'];
        $selectUser="SELECT * FROM users WHERE user_id='$userid'";
        $query=$conn->prepare($selectUser);
        $query->execute();
        $result=$query->fetch();
        
       
}catch(PDOException $e){
    "Select failed: ".$e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE PAGE</title>
    <link rel="stylesheet" href="../dist/css/update_page.css">
      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  

<div class="container">
        <!-- NAV BAR -->
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="border-radius: 15%;">
            <div class="container-fluid ">
                <a class="navbar-brand" href="http://localhost/php/cars_book/index.php">CarS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>                       
                    </ul>
                </div>
            </div>
        </nav>
    <div class="editBox">
        <!-- EDIT USER -->
    <h3 style="font-weight: bold;">EDIT  USER</h3>
        <form action="../scripts/user_edit.php" method="POST">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" required value="<?php echo $result['first_name']; ?>">

            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" required value="<?php echo $result['last_name']; ?>">

            <label for="email">Email</label>
            <input type="text" name="email" required value="<?php echo $result['email']; ?>">

            <label for="date">License Date</label>
            <input type="text" name="license_date" required value="<?php echo $result['license_date']; ?>">
            
            <input type="hidden" name='userid'  value="<?php echo $result['user_id'];?>">    
            <label for="submit"></label>
            <input type="submit" value="CHECK IN" class="submit" name="submit">

        </form>
    </div>
</div>








<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
