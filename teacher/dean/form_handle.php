<?php
 include('session.php');
require('connect.php');

   
            //ADD DEPT
   
   if(isset($_POST['submitdept'])){
      $college = $_SESSION['college'];
      $dept = $_POST['dept'];
      $dept = strtoupper($dept);
      $sql_check = " SELECT * FROM DEPT_LIST WHERE faculty='$college' AND dept = '$dept' " ;
      $check_result = mysqli_query($conn, $sql_check);
      $resultcount = mysqli_num_rows($check_result);
      if($resultcount>0){
         $msg = "Dept " .$dept. " already exists in ".$college ;
         header("Location:dean_panel.php?msg=$msg");
      }
      else{
         $sql = " INSERT INTO DEPT_LIST (faculty,dept) VALUES('$college','$dept')" ;
         mysqli_query($conn, $sql);
         $msg = "Dept " .$dept. " added in " .$college ;
         header("Location:dean_panel.php?msg=$msg");
      }
   }


               //ADD course
   
   if(isset($_POST['submitcourse'])){
      $college = $_POST['college'];
      $college = strtoupper($college);
      $dept = $_POST['dept'];
      $dept = strtoupper($dept);
      $course = $_POST['course'];
      $course = strtoupper($course);
      $sem = $_POST['sem'];
      $sem = (int)$sem;

      $sql_dept_id = " SELECT dept_id FROM DEPT_LIST WHERE faculty='$college' AND dept = '$dept' " ;
      $dept_id_result = mysqli_query($conn, $sql_dept_id);
      $resultcount = mysqli_num_rows($dept_id_result);
      if($resultcount == 1){
         while($dept_id_row = mysqli_fetch_assoc($dept_id_result)){
            $dept_id = $dept_id_row['dept_id'];
            $course_check = " SELECT * FROM COURSE WHERE dept_id='$dept_id' AND course='$course' " ;
            $course_check_result = mysqli_query($conn, $course_check);
            $course_check_count = mysqli_num_rows($course_check_result);
            if($course_check_count<1){
               $sql = " INSERT INTO COURSE (dept_id,course) VALUES('$dept_id','$course')" ;
               mysqli_query($conn, $sql);
               $sql_course_id = " SELECT course_id FROM COURSE WHERE dept_id = '$dept_id' AND course = '$course' " ;
               $course_id_result = mysqli_query($conn, $sql_course_id);
               $resultcount = mysqli_num_rows($course_id_result);
               while($course_id_row = mysqli_fetch_assoc($course_id_result)){
                  $course_id = $course_id_row['course_id'];
                  //echo $course_id;
                  for($x=1;$x<=$sem;$x++){
                     //echo "<br>";
                     $semname = "SEM".$x;
                     $sem_sql = " INSERT INTO SEMESTER (course_id, sem) VALUES ('$course_id', '$semname'); " ;
                     mysqli_query($conn, $sem_sql);
                  }
               }
               $msg = "Data added successfully";
               header("Location:welcome.php?msg=$msg");
               exit();
            }else{
               $msg = "Course already exists";
               header("Location:welcome.php?msg=$msg");
               exit();
            }
         }
      }else{
         $msg = "something error";
         header("Location:welcome.php?msg=$msg");
      }        
   }

            //ADD teacher/student
   
   if(isset($_POST['submitteacher'])){
      $college = $_POST['college'];
      $college = strtoupper($college);
      $dept = $_POST['dept'];
      $dept = strtoupper($dept);
      header("Location:addmember.php?college=$college&dept=$dept");
   }
         

               //ADD teacher on addmember.php page


   if (isset($_POST['addteachersubmit'])){
      $college = $_POST['college'];
      $dept_id = $_POST['dept_id'];
      $dept = $_POST['dept'];
      $prof_name = strtoupper(mysqli_real_escape_string($conn, $_POST['prof_name']));
      $userid = mysqli_real_escape_string($conn, $_POST['userid']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      if (empty($prof_name) || empty($userid) || empty($password)){
         $msg = "incomplete details try again";
         header("Location:addmember.php?msg=$msg");
         exit();
      }else{
         $query = "SELECT * FROM PROFESSOR WHERE userid='$userid'";
         $result = mysqli_query($conn, $query);
         $resultcheck = mysqli_num_rows($result);
         if($resultcheck>0){
            $msg="User Id already exists";
            header("Location:addmember.php?college=$college&dept=$dept&msg=$msg");
            exit();
         }else{
            $HashPassword = password_hash($password,PASSWORD_DEFAULT);
            $query = "INSERT INTO PROFESSOR (prof_name, college, dept_id, userid, password) VALUES('$prof_name','$college','$dept_id','$userid','$HashPassword')";
            mysqli_query($conn, $query);
            $msg = "added teacher".$prof_name;
            header("Location:addmember.php?college=$college&dept=$dept&msg=$msg");
         }
      }
   }

   /*if(isset($_POST['addteachersubmit'])){
      $college = $_POST['college'];
      $dept = $_POST['dept'];
      $prof_name = strtoupper($_POST['prof_name']);
      $userid = $_POST['userid'];
      $password = $_POST['password']; 
      $HashPassword = password_hash($password,PASSWORD_DEFAULT);
      $sql= " INSERT INTO PROFESSOR (prof_name, college, dept_id, userid, email, password) VALUES ('$prof_name', '$college', $dept_id, '$userid', '$email', '$HashPassword') " ;
      mysqli_query($conn, $sql);
      header("Location:addmember.php?college=$college&dept=$dept");
   }*/
?>