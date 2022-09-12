<?php
session_start();

include_once('db.php');

//Schools Sign Up code
 if(isset($_POST['feedback'])){
    //Get Input data
    $email = $_SESSION['email'];
    $schoolName = $_SESSION['schoolName'];
    $feedback = $_POST['Thefeedback'];
 

    $sql = "INSERT INTO feedback (email,feedback, schoolName) VALUES ('$email', '$feedback','$schoolName')";
    $res = mysqli_query($con,$sql);
     
  
     if($res ==1){
       //set session variables
       $_SESSION['email'] = "$email";
      
       echo"<script>alert('Feedback successful Submited, Thank you.')</script>"; 
       echo"<script>location.replace('../GiveFeedback.html');</script>";

       }   
      
 }

?>