<?php
include_once('db.php');

//Schools Sign Up code
 if(isset($_POST['Submit'])){
    //Get Input data
    $email = $_POST['email'];
    $countyNo = $_POST['countyNo'];
    $schoolName = $_POST['schoolName'];
    $studentNumber = $_POST['StudentNumber'];
    $password = $_POST['password'];

 

    //Insert data to MYSQL database
    $sql1="SELECT * FROM authentication where email = '$email' Limit 1";
    
    $result= mysqli_query($con,$sql1);
    $queryResults= mysqli_num_rows($result);
    
    
      if($queryResults) {
         echo"<script>alert('A user with same email already exist. Try again with a different email.')</script>"; 
         echo"<script>location.replace('../SchoolSignUp.html');</script>";
      }else{
         $encryptedPassword = md5($password);
         $sql = "INSERT INTO authentication (email, countyNo, password, schoolName) VALUES ('$email', '$countyNo','$encryptedPassword','$schoolName')";
         $res = mysqli_query($con,$sql);
     
  
     if($res ==1){
      
      $sql1="SELECT * FROM schoolnumber where email = '$email' Limit 1";

      $result= mysqli_query($con,$sql1);
      $queryResults= mysqli_num_rows($result);
      
      
        if($queryResults) {
          while($row = mysqli_fetch_assoc($result)){
            $sql = "UPDATE schoolnumber set studentNumber = '$studentNumber' where email= '$email'";
            $res = mysqli_query($con,$sql);       
             if($res ==1){
               echo"<script>alert('Registration successful. You can log in now.')</script>"; 
               echo"<script>location.replace('../SchoolSignIn.html');</script>";
             }
          }
            
        }else{
          //Insert
          $sql = "INSERT INTO schoolnumber (email, studentNumber, schoolName) VALUES ('$email', '$studentNumber','$schoolName')";
             $res = mysqli_query($con,$sql);
         
      
         if($res ==1){
            echo"<script>alert('Registration successful. You can log in now.')</script>"; 
            echo"<script>location.replace('../SchoolSignIn.html');</script>";
         }
        }

       }   
      }
 }


 if(isset($_POST['DonorSubmit'])) {
    //Get Input data
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

 

    //Insert data to MYSQL database
    $sql1="SELECT * FROM donorauthentication where email = '$email' Limit 1";
    
    $result= mysqli_query($con,$sql1);
    $queryResults= mysqli_num_rows($result);
    
    
      if($queryResults) {
         echo"<script>alert('A donor with same email already exist. Try again with a different email.')</script>"; 
         echo"<script>location.replace('../DonorSignUp.html');</script>";
      }else{
         $encryptedPassword = md5($password);
         $sql = "INSERT INTO donorauthentication (email, fullname, password) VALUES ('$email', '$fullname','$encryptedPassword')";
         $res = mysqli_query($con,$sql);
     
  
     if($res ==1){

      
       echo"<script>alert('Registration successful. You can log in now.')</script>"; 
       echo"<script>location.replace('../DonorSignIn.html');</script>";

       }   
      }
 }
?>