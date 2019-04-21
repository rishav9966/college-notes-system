<html>
<head>
   <body>
      <!--<form action="insert.php" method="POST">
         prof_name<input type="text" name="prof_name" required>
         <br>college<input type="text" name="college" required>
         <br>dept_id<input type="number" name="dept_id" required>
         <br>userid<input type="text" name="userid" required>
         <br>email<input type="email" name="email" required>
         <br>password<input type="password" name="password" required>
         <input type="submit" name="submit" value="submit">
      </form>-->
      <form action="insert.php" method="POST">
         userid<input type="text" name="userid" required>
         <br>password<input type="password" name="password" required>
         <input type="submit" name="submit" value="submit">
      </form>
      <?php
      if(isset($_GET['res'])){
         echo "success";
      }
      ?>
   </body>
</head>
</html>