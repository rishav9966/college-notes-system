<?php
   include('connect.php');
   session_start();
   
   $user_check = $_SESSION['userid'];   
   if(!isset($_SESSION['userid'])){
      header("location:index.html?again");
      die();
   }
?>