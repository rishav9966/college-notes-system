<html>
<head>
   <title>Home Page </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/student_index.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="jquery.js"></script>
</head>
<body>
   <?php
      if(isset($_POST['submit'])){         
         $cookie_value = $_POST['selectcollege'];
         setcookie("college_name", $cookie_value, 0, "/");
         header('Location:coursedetails.php');
      }
   ?>
   <div class="searchbox1 container p-3">
   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
         <select class="form-control" name="selectcollege" >
            <option selected="" disabled="">SELECT COLLEGE</option>
            <?php 
               require('connect.php');
               $sql = "SELECT * FROM COLLEGE_LIST";
               $result = mysqli_query($conn, $sql);
               while($rows = mysqli_fetch_assoc($result)){
                  echo "<option>". $rows['faculty'] ."</option>";
               }
            ?>
         </select><br>
      <div class="d-flex justify-content-center">
         <input class="text-center rounded" type="submit" name="submit" value="submit">
      </div>
   </form>
   </div>
</body>
</html>