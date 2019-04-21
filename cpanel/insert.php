<?php

/*if (isset($_POST['submit'])){
   require('connect.php');
   $prof_name = mysqli_real_escape_string($conn, $_POST['prof_name']);
   $college = mysqli_real_escape_string($conn, $_POST['college']);
   $dept_id = mysqli_real_escape_string($conn, $_POST['dept_id']);
   $userid = mysqli_real_escape_string($conn, $_POST['userid']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);   
   $HashPassword = password_hash($password,PASSWORD_DEFAULT);
   $sql= " INSERT INTO PROFESSOR (prof_name, college, dept_id, userid, email, password) VALUES ('$prof_name', '$college', $dept_id, '$userid', '$email', '$HashPassword') " ;
   mysqli_query($conn, $sql);
   header('Location:index.php?res=success');
}*/

if (isset($_POST['submit'])){
   require('connect.php');
   $userid = mysqli_real_escape_string($conn, $_POST['userid']);
   $password = mysqli_real_escape_string($conn, $_POST['password']); 
     
   $HashPassword = password_hash($password,PASSWORD_DEFAULT);
   $sql= " INSERT INTO admin (admin_id, password) VALUES ('$userid', '$HashPassword') " ;
   mysqli_query($conn, $sql);
   header('Location:insert.php?res=success');
}


?>