<?php
   include('../connect.php');
   session_start();
   
   $user_check = $_SESSION['userid'];
   if(!isset($_SESSION['userid']) && ($_SESSION['role']=="dean")){
      header("location:../welcome.php?again");
      die();
   }
?>