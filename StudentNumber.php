<?php 
session_start();
include_once('Backened/db.php');

if(isset($_POST['changeStudentNumber'])){
  $studentNumber = $_POST['newNumber'];
  $email = $_SESSION['email'];
  $schoolName = $_SESSION['schoolName'];
  
  
  $sql1="SELECT * FROM schoolnumber where email = '$email' Limit 1";

  $result= mysqli_query($con,$sql1);
  $queryResults= mysqli_num_rows($result);
  
  
    if($queryResults) {
      while($row = mysqli_fetch_assoc($result)){
        $sql = "UPDATE schoolnumber set studentNumber = '$studentNumber' where email= '$email'";
        $res = mysqli_query($con,$sql);       
         if($res ==1){
          echo"<script>alert('Edit Success, Thank you.')</script>"; 
          echo"<script>location.replace('StudentNumber.php');</script>";
         }
      }
        
    }else{
      //Insert
      $sql = "INSERT INTO schoolnumber (email, studentNumber, schoolName) VALUES ('$email', '$studentNumber','$schoolName')";
         $res = mysqli_query($con,$sql);
     
  
     if($res ==1){
      echo"<script>alert('Success, Thank you.')</script>"; 
      echo"<script>location.replace('StudentNumber.php');</script>";
     }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student number</title>
    <link rel="stylesheet" href="StudentNumber.css" />
  </head>
  <body>
    <nav class="nav">
      <h1>SPMS</h1>
      <ul class="nav-elements">
        <li>Home</li>
        <li>About</li>
      </ul>
    </nav>
    <div class="student-number-container">

      <div>
        <?php 

        $email = $_SESSION['email'];
      
        
        $sql1="SELECT * FROM schoolnumber where email = '$email' Limit 1";
    
        $result= mysqli_query($con,$sql1);
        $queryResults= mysqli_num_rows($result);
        
        
          if($queryResults) {
            while($row = mysqli_fetch_assoc($result)){
                echo "<p> Current student Number: ".$row['studentNumber']."</p>";
            }
          }

        ?>

      </div>

      <form action="StudentNumber.php" method="post">
        <div>
          <label
            >Enter new <br />
            student number</label
          >
          <input
          name="newNumber"
            type="text"
            name="student-number-email"
            placeholder="eg. 150"
            class="student-number-input"
            required
          />
        </div>
        <button class="student-number-button" name="changeStudentNumber">Submit</button>
      
      </form>
      <a href="SchoolLandingPage.html"><button class="student-number-button">Back</button></a>
    </div>
  </body>
</html>


