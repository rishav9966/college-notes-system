<?php
   require('connect.php');
?>
<html>
   <head>
      <title>selectbranch</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../css/student_index.css">
      <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
      <script src="jquery.js" type="text/javascript"></script>
   </head>
   <body>
      <?php
         require('checkcookie.php');
      ?>
      <div class="container-fluid text-center bg-primary font-weight-bold">
         <h1>
            <?php
               echo $_COOKIE['college_name'];
            ?>
         </h1>
      </div>

      <div class="searchbox2 container p-3">
      <form role="form" action="form_coursedetail.php" method="POST">

         <label for="dept">Department</label>
         <select class="form-control" name="dept" id="dept">
            <option selected="" disabled="">SELECT DEPARTMENT</option>
            <!--<option value="">SELECT DEPARTMENT</option>-->
            <?php
               require('connect.php');
               $college_name = $_COOKIE['college_name'];
               $sql = "SELECT * FROM DEPT_LIST WHERE faculty='$college_name' ";
               $result = mysqli_query($conn, $sql);
               while($row = mysqli_fetch_assoc($result)){
                  echo "<option id='".$row['dept_id']."' value='".$row['dept']."'>".$row['dept']."</option>";
               }
            ?>
         </select><br>

         <label for="course">Course</label>
         <select class="form-control" name="course" id="course">
            <option selected="" disabled="">SELECT COURSE</option>
            <!--<option value="">SELECT COURSE</option>-->
         </select><br>

         <label for="sem">Sem</label>
         <select class="form-control" name="sem" id="sem">
            <option selected="" disabled="">SELECT SEMESTER</option>
            <!--<option value="">SELECT SEMESTER</option>-->
         </select><br>
            
         <div class="d-flex justify-content-center">
            <input class="rounded" id="submit" type="submit" value="Enter" name='submit'>
         </div>
      </form>
      </div>
   </body>
</html>