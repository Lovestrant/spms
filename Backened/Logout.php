<?php 
if(isset($_POST['schoolLogout'])){
//remove all session variables
session_unset();
//destroy session

session_destroy();
//go to index page

echo "<script>location.replace('../index.html');</script>";
}

?>