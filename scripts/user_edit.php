
<?php 

require_once("../data_connection.php");

if(isset($_POST['submit'])){
    try{
        $userid=$_POST['userid'];
        $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $license_date=$_POST['license_date'];
    
    echo "$userid";
    
// UPDATING USER
    $updateSql="UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', license_date='$license_date' WHERE user_id='$userid'";
    $query=$conn->prepare($updateSql);
    $result=$query->execute();
    var_dump($result);
    

    if($result){
        header("Location: http://localhost/php/cars_book/index.php");
    }



    }catch(PDOException $e){
        echo "Update failed: ".$e->getMessage();
    }
}else{
    header("Location: http://localhost/php/cars_book/index.php");
}



?>
