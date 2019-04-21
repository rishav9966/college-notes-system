<?php
   require('connect.php');
   if(isset($_POST['submit'])){
      if(empty($_POST['sem']) || empty($_POST['course'])){
         header("Location:coursedetails.php?");
      }else{
         $dept = $_POST['dept'];
         $course = $_POST['course'];
         $sem = $_POST['sem'];
         setcookie('dept', $dept, 0, "/");
         setcookie('course', $course, 0, "/");
         setcookie('sem', $sem, 0, "/");
         header("Location:subjectlist.php?dept=$dept&course=$course&sem=$sem");
         /*$sql = " select * from SUBJECT_TABLE where sem_id =(select sem_id from SEMESTER where course_id = (select course_id from COURSE where dept_id = (select dept_id from DEPT_LIST where dept ='dept' AND course ='course') AND sem = '$sem' )) ";
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
            echo $row['subject'];
         }*/
      }
   }
?>