<?php
   include('connect.php');
   session_start();
   
   $user_check = $_SESSION['userid'];
   
   $ses_sql = "SELECT prof_name FROM PROFESSOR WHERE userid = '$user_check'";
   
   $result = mysqli_query($conn, $ses_sql);
   $row = mysqli_fetch_assoc($result);
   
   $login_session = $row['prof_name'];
   
   if(!isset($_SESSION['userid'])){
      header("location:index.html?again");
      die();
   }
?>