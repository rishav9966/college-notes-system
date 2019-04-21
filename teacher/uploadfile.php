<?php
 include('session.php');
 if (!isset($_GET['subject']) || !isset($_GET['sem']) || !isset($_GET['course']) || !isset($_GET['dept'])){
    header("Location:welcome.php");
 }
$college = $_SESSION['college'];
$filepath = $college.'/'.$_GET['dept'].'/'.$_GET['course'].'/'.$_GET['sem'].'/'.$_GET['subject'];
?>
<html>
<head>
   <title></title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../css/teacher_index.css">
   <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
   <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <style>
   td{
      word-break:break-word;
   }
   </style>
   <script>
      $(document).ready(function(){
         $("#notes").click(function(){
            $("#assignmentform").slideUp();
            $("#notesform").slideToggle();
         });
      });
      $(document).ready(function(){
         $("#assignment").click(function(){
            $("#notesform").slideUp();
            $("#assignmentform").slideToggle();
         });
      });
   </script>
</head>
<body>
   <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                  <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="logout.php"">Logout</a>
               </li>
         </ul>
      </div>
   </nav>

   <div class="container-fluid mt-3">
      <table class="table table-danger" style="width:100%;">
         <thead class="table-dark">    
            <tr class="border">
               <th class="py-2">SUBJECT</th>
               <th class="py-2">SEM</th>
               <th class="py-2">COURSE</th>
               <th class="py-2">DEPT</th>
            </tr>
         </thead>
         <tbody>
            <tr class="border">
               <td class="py-2"><?php echo $_GET['subject']; ?></td>
               <td class="py-2"><?php echo $_GET['sem']; ?></td>
               <td class="py-2"><?php echo $_GET['course']; ?></td>
               <td class="py-2"><?php echo $_GET['dept']; ?></td>
            </tr>
         </tbody>
      </table>
   </div>
   <div class="container-fluid row m-0">
      <div class="col-sm-6 text-center my-3 w-100">
         <div id="notes" class="btn btn-primary btn-lg btn-block" style="width:100%">Notes</div>
      </div>
      <div class="col-sm-6 assignment text-center my-3">
         <div id="assignment" class="btn btn-info btn-lg btn-block" style="width:100%">Assignments</div>
      </div>
   </div>

   <div id="notesform" style="display:none;">
      <?php $notespath = $filepath.'/'.'notes'.'/'; ?>
      <form class="w-100 container-fluid" method="post" action="uploadnotes.php" enctype="multipart/form-data">
         <div class="form-group row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6 text-center py-4">
               <input type="hidden" name="notespath" value="<?php echo $notespath; ?>">
               <input class="text-center btn btn-primary px-3 ml-0" type="file" name="Filename">
               <div class="text-center p-4">
                  <textarea class="rounded border border-primary" rows="3" cols="30" name="Description"></textarea>
               </div>
               <button type="submit" class="btn btn-primary m-3">upload</button>
            </div>
            <div class="col-sm-3">
            </div>
         </div>
      </form>
   </div>

   <div id="assignmentform" style="display:none;">
      <?php $assignmentpath = $filepath.'/'.'assignment'.'/'; ?>
      <form class="w-100 container-fluid" method="post" action="uploadassignment.php" enctype="multipart/form-data">
         <div class="form-group row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6 text-center py-4">
               <input type="hidden" name="assignmentpath" value="<?php echo $assignmentpath; ?>">
               <input class="text-center btn btn-info px-3 my-3 ml-0" type="file" name="Filename" required>
               <input class="text-center btn border border-info px-3 my-3 ml-0" type="date" name="lastdate" required>
               <div class="text-center p-4">
                  <textarea class="rounded border border-info" rows="3" cols="30" name="description"></textarea>
               </div>
               <button type="submit" class="btn btn-info m-3">upload</button>
            </div>
            <div class="col-sm-3">
            </div>
         </div>
      </form>
   </div>

</body>
</html>