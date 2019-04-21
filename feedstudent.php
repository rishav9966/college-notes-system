<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../css/teacher_index.css">
      <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
      <script src="jquery.js" type="text/javascript"></script>
   </head>

   <body>
   <div class="text-center">
      <h2><u>STUDENT SIGNUP FORM</u></h2>
   </div><br>      
   <form class="container" action="signup.php" method="POST">
      <div class="form-group sm-6">
         <label for="name">Roll_No:</label>
         <input type="text" class="form-control" placeholder="Enter Your Roll_No">
      </div>
      <div class="form-group sm-6">
         <label for="name">Name:</label>
         <input type="text" class="form-control" name="email" placeholder="Enter Your Name">
      </div>
      <div class="form-group sm-6">
         <label for="name">Email_Id:</label>
         <input type="email" class="form-control" name="email" placeholder="Enter Your E-mail">
      </div>
      <div class="form-group sm-6">
         <label for="name">Mobile_No:</label>
         <input type="number" class="form-control" placeholder="Enter Your Mobile No">
      </div>
      <div class="form-group sm-6">
         <label for="name">Password:</label>
         <input type="password" class="form-control" placeholder="Enter Your Password">
      </div>
      <div class="form-group sm-6">
         <label for="name">College Name:</label>
         <input type="text" class="form-control" placeholder="Enter Your College Name">
      </div>
      <div class="form-group sm-6">
         <label for="dept">Department:</label>
         <input type="text" class="form-control" placeholder="Enter Your Department Name">
      </div>
      <div class="form-group sm-6">
         <label for="course">Course:</label>
         <input type="text" class="form-control" placeholder="Enter Your Course">
      </div>
      <div class="form-group sm-6 text-center">
         <input type="submit" name="submit" value="submit">
      </div>
   </form>
      <?php
      if(isset($_GET['msg'])){
         echo "success";
      }
      ?>
   </body>
</html>