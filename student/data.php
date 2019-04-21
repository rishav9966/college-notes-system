<?php
   require('connect.php');

   if(isset($_POST['deptval'])){
      $dept = $_POST['deptval'];
      $sql = "SELECT * FROM DEPT_LIST WHERE dept='$dept' ";
      $result = mysqli_query($conn, $sql);
      while($row= mysqli_fetch_assoc($result)){
         $dept_id = $row['dept_id'];
      }
      setcookie("dept_id", $dept_id, 0, "/");
      $sql = "SELECT * FROM COURSE WHERE dept_id=$dept_id ";
      $result = mysqli_query($conn, $sql);
      $course_row = array();
      //setcookie("dept", $dept, 0, "/");
      while($row = mysqli_fetch_assoc($result)){
         $course_row[] = $row;
      }
      echo json_encode($course_row);
   }
   if(isset($_POST['courseval'])){
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
   }

?>




























<?php
/*require('connect.php');
            $college_name = $_COOKIE['college_name'];
            $sql = "SELECT * FROM DEPT_LIST WHERE faculty='$college_name' ";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
               echo '<option value="'.row['dept'].'">'. $row['dept'] .'</option>';
            }*/

?>