<?php
   require('connect.php');
   session_start();
   if (isset($_POST['submit'])) {
      $userid = mysqli_real_escape_string($conn, $_POST['userid']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      if(empty($userid) || empty($password)){
         header("Location:index.html?detail=empty");
         exit();
      }else {
         $sql = "SELECT * FROM admin WHERE userid = '$userid'";
         $result = mysqli_query($conn, $sql);
         $resultcount = mysqli_num_rows($result);
         if($resultcount<1){
            header("Location:index.html?login:retry");
            exit();
         }else{
            while($row = mysqli_fetch_assoc($result)){
               $HashPassword = password_verify($password, $row['password']);
               if(!$HashPassword){
                  header("Location:index.html?password error");
                  exit();
               }elseif($HashPassword) {
                  $_SESSION['status'] = "Active";
                  $_SESSION['userid'] = $userid;
                  header("Location: welcome.php");
                  exit();
               }
            }
         }
      }
   } else{
      header("Location:login.html?login=error");
      exit();
   }
?>