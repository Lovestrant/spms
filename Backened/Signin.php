<?php
session_start();

include_once('db.php');

//Schools Sign Up code
 if(isset($_POST['Submit'])){
    //Get Input data
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password1 = md5($password);

    //Insert data to MYSQL database
    $sql1="SELECT * FROM authentication where email = '$email' and password='$password1' Limit 1";
    
    $result= mysqli_query($con,$sql1);
    $queryResults= mysqli_num_rows($result);
    
    
      if($queryResults) {
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['email'] = $email;
            $_SESSION['user'] = "School";
            $_SESSION['schoolName'] = $row['schoolName'];
            $_SESSION['countyNo'] = $row['countyNo'];
    
            echo"<script>alert('Login Success, You will be directed to dashboard')</script>"; 
            echo"<script>location.replace('../SchoolLandingPage.html');</script>";
        }
         
      }else{
        echo"<script>alert('Wrong Credentials. Try again')</script>"; 
        echo"<script>location.replace('../SchoolSignIn.html');</script>";
      }
 }


 //Donor Sign in
 if(isset($_POST['DonorLogin'])){
    //Get Input data
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password1 = md5($password);

    //Insert data to MYSQL database
    $sql1="SELECT * FROM donorauthentication where email = '$email' and password='$password1' Limit 1";
    
    $result= mysqli_query($con,$sql1);
    $queryResults= mysqli_num_rows($result);
    
    
      if($queryResults) {
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['email'] = $email;
            $_SESSION['user'] = "Donor";
            $_SESSION['fullname'] = $row['fullname'];
    
            echo"<script>alert('Login Success, You will be directed to dashboard')</script>"; 
            echo"<script>location.replace('../DonorLandingPage.html');</script>";
        }
         
      }else{
        echo"<script>alert('Wrong Credentials. Try again')</script>"; 
        echo"<script>location.replace('../DonorSignIn.html');</script>";
      }
 }

?>