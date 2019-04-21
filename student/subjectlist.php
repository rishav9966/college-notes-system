<?php
         require('connect.php');
         if (!isset($_GET['sem']) || !isset($_GET['course']) || !isset($_GET['dept'])){
            header("Location:coursedetails.php?msg=retry");
         }else{
            $dept = $_GET['dept'];
            $course = $_GET['course'];
            $sem = $_GET['sem'];
            $sql = " SELECT * FROM SUBJECT_TABLE WHERE sem_id=(SELECT sem_id FROM SEMESTER WHERE course_id=(SELECT course_id FROM COURSE WHERE dept_id=(SELECT dept_id FROM DEPT_LIST WHERE dept='$dept' AND COURSE='$course') AND sem='$sem')) ";
            $result = mysqli_query($conn, $sql);
            $results = mysqli_query($conn, $sql);
            $filepath = '../docs/'.$_COOKIE['college_name'].'/'.$_GET['dept'].'/'.$_GET['course'].'/'.$_GET['sem'].'/';
         }
?>
<html>
   <head>
      <title>subjectlist</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../css/student_index.css">
      <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
      <!--<script src="js/bootstrap.min.js"></script>-->
      <script src="jquery.js" type="text/javascript"></script>
      <style>
         .notestd{
            word-break:break-word;
         }
      </style>
      <script>
         $(document).ready(function(){
            <?php
               $tag = 0;
               $check = 0;
               while($row = mysqli_fetch_assoc($results)){
                  $tag += 1;
            ?>
               $(".<?php echo "sub".$tag ;?>").click(function(){
                  <?php for($x=1;$x<=8;$x++)
                  {
                     if($x!=$tag)
                     {
                  ?>
                  $(".<?php echo "prof".$x ;?>").slideUp();
                  <?php
                     }
                  } 
                  ?>
                  $(".<?php echo "prof".$tag ;?>").slideToggle("slow");
            });
            <?php 
               }
            ?>
         });
      </script>
   </head>
   <body class="bg-info">
   <div class="container-fluid">
      <div class="container text-center font-weight-bold mt-2 mb-1"><h2 class="text-light">SUBJECT</h2></div>
      <?php
         $tagid = 0;
         while($rows = mysqli_fetch_assoc($result)){
            $tagid += 1;
      ?>
         <div class="bg-danger row card text-light border hello p-0 my-1">
               <div <?php echo "class=".'"'."sub".$tagid ; ?> font-weight-bold py-2" style="user-select:none;">
                  <span style="display:inline-block; width: 10;"></span>
                  <?php 
                     $subject = $rows['subject'];
                     $filetarget = $filepath.$subject.'/'.'notes'.'/';
                     echo $subject ; 
                  ?>
               </div>

               <div <?php echo "class=".'"'."prof".$tagid ; ?> text-center" style="display:none;">
                  <span style="display:inline-block; width: 10;"></span>
                  <?php echo $rows['professor']; ?>
                  <?php 
                     //$filepath = $filepath.$subject.'/'.'notes'.'/';
                     $notes_sql = " SELECT * FROM NOTES WHERE filepath='$filetarget' ORDER BY datetime DESC";
                     $notes = mysqli_query($conn, $notes_sql);
                  ?>
                  <div class="container-fluid mt-3">
                     <table class="table table-danger" style="width:100%;">
                        <tbody>
                           <?php while($notes_row = mysqli_fetch_assoc($notes)){
                              $target = $notes_row['filepath'].$notes_row['filename'];
                           ?>
                              <tr>
                                 <td class="notestd"><?php echo $notes_row['filename'];?></td>
                                 <td class="notestd"><?php echo $notes_row['description']; ?></td>
                                 <td class="notestd"><a target="_blank" href="<?php echo $target; ?>">View/Downlaod</a></td>
                              </tr>
                           <?php
                              }
                           ?>
                        </tbody>
                     </table>
                  </div>
               </div>
         </div>
      <?php      
         }
      ?>
   </div>
   </body>
</html>