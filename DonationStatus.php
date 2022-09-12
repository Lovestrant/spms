<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Reports</title>
    <link rel="stylesheet" href="ViewReports.css" />
  </head>
  <body>
    <nav class="nav">
      <h1>SPMS</h1>
      <ul class="nav-elements">
        <a href="Logout.html"><li>Logout</li></a>
        <li>Home</li>
        <li>name</li>
        <div
          style="
            border-radius: 50%;
            height: 50px;
            width: 50px;
            background-color: white;
          "
        ></div>
      </ul>
    </nav>
    <div class="view-reports-container">
      <?php 
      include_once('Backened/db.php');
      $email = $_SESSION["email"];
            
      $sql = "SELECT * FROM donations where email ='$email'";
      $result = mysqli_query($con, $sql);
      $queryResults = mysqli_num_rows($result);
      if($queryResults){
          while($row = mysqli_fetch_assoc($result)){
            $fullname = $row['fullname'];
            $numberOfPierces = $row['numberOfPierces'];
            $status = $row['status'];


            echo "
            <div class='individual-school'>
            <div class='aligner'>
              <p>YourName: ".$fullname.":</p>
              <p>Pierces Donated: ".$numberOfPierces."</p>
              <p>status: ".$status."</p>
            </div>
          </div>";
          
         }
       }
        
 
      ?>
      <div class="view-report-button-container">
        <button class="view-report-button">More</button>
        <a href="DonorLandingPage.html"><button class="view-report-button">Back</button></a>
      </div>
    </div>
  </body>
</html>
