<?php
session_start();
include_once('db.php');

//Schools Sign Up code
 if(isset($_POST['Donate'])){
    //Get Input data
    $numberOfPierces = $_POST['numberOfPierces'];
    $email = $_SESSION['email'];
    $fullname = $_SESSION['fullname']; 
    
   
    $sql = "INSERT INTO donations (email, fullname, numberOfPierces,status) VALUES ('$email', '$fullname','$numberOfPierces','Delivered')";
    $res = mysqli_query($con,$sql);


    if($res ==1){
    
    echo"<script>alert('Donation Successfull')</script>"; 
    echo"<script>location.replace('../GiveDonations.html');</script>";

    } 
 }

?>