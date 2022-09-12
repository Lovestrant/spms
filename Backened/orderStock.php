<?php
session_start();
include_once('db.php');

//Schools Sign Up code
 if(isset($_POST['orderStock'])){
    //Get Input data
    $numberOfPierces = $_POST['numberOfPierces'];
    $countyNo = $_SESSION['countyNo'];
    $email = $_SESSION['email'];
    $schoolName = $_SESSION['schoolName']; 
    
    $encryptedPassword = md5($password);
    $sql = "INSERT INTO orders (numberOfPierces, countyNo, email, schoolName) VALUES ('$numberOfPierces', '$countyNo','$email','$schoolName')";
    $res = mysqli_query($con,$sql);


    if($res ==1){
    
    echo"<script>alert('Order Successfull')</script>"; 
    echo"<script>location.replace('../OrderStock.html');</script>";

    } 
 }

?>