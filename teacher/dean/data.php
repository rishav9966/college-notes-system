<?php
   require('connect.php');

   if(isset($_POST['z'])){
      $college = $_POST['collegeval'];
      $sql = " SELECT * FROM DEPT_LIST WHERE faculty='$college' ";
      $result = mysqli_query($conn, $sql);
      $dept_row = array();
      //setcookie("dept", $dept, 0, "/");
      while($row = mysqli_fetch_assoc($result)){
         $dept_row[] = $row;
      }
      echo json_encode($dept_row);
   }




   
   /*if(isset($_POST['courseval'])){
      $courseval = $_POST['courseval'];
      setcookie("course", $courseval, 0, "/");
      $dept_id = $_COOKIE['dept_id'] ;
      //$sql = " SELECT * FROM SEMESTER WHERE course_id =(SELECT COURSE_ID FROM COURSE WHERE dept_id=(SELECT dept_id FROM DEPT_LIST where dept='$deptval') AND COURSE='$courseval' ) ";
      $sql = " SELECT * FROM SEMESTER WHERE course_id =(SELECT COURSE_ID FROM COURSE WHERE dept_id=$dept_id AND COURSE='$courseval' ) ";
      $result = mysqli_query($conn, $sql);
      $sem_row = array();
      while($row = mysqli_fetch_assoc($result)){
         $sem_row[] = $row;
      }
      echo json_encode($sem_row);
   }*/

?>
