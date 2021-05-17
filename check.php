<?php
session_start();
if(!isset($_SESSION['is_register']) || $_SESSION['is_register'] != true){

    header("register.php");
    exit;
}
if(isset($_GET['id'])){

require 'C:/xampp/htdocs/sign_recognition/db.php';
$id = mysqli_real_escape_string($conn,$_GET['id']);  //thrown from email
// echo $id;
$result = mysqli_query($conn,"UPDATE `users` SET `VERIFY_STATUS` = '1' WHERE `VERIFICATION_ID` = {$_GET['id']}");
// echo var_dump($result);
echo "<br>";
if($result){
echo "Your account is verified";
}
else{
    echo "account not verified";
}
}   


?>
<a href="login.php" name="verify">Click here to login</a>
