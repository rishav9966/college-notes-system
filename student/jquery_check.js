<?php
               //echo '$'.'('.'"'.'.'.'1'.'"'.')'.'.'.'hover('.'function('.'){';
            ?>
            $(".<?php echo "sub2";?>").hover(function(){
               $(".prof2").slideToggle("slow");
            });
            
               $(".<?php echo "sub"."1" ;?>").hover(function(){
               $(".prof1").slideToggle("slow");
            });



$(".<?php echo "sub2";?>").hover(function(){
               $(".prof2").slideToggle("slow");
            });
            
               $(".<?php echo "sub"."1" ;?>").hover(function(){
               $(".prof1").slideToggle("slow");
            });


/*$(".1").hover(function(){
               $(".prof1").slideToggle("slow");
            });*/




            <?php
               //echo '$'.'('.'"'.'.'.'1'.'"'.')'.'.'.'hover('.'function('.'){';
            ?>





            










            <?php
            include('session.php');
           
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
               <script>
                   $(document).ready(function(){
                       $(".navbutton").click(functoion(){
                           $(".sidebar").fadeToogle(100);
                       })
                   })
               </script>
           </head>
           <body>
           
           
           <div class="bg-info row container-fluid p-0 m-0 h-100">
               <div class="border-right sidebar col-sm-3" style="visibility:hidden;">
                   <ul class="px-0 pt-2">
                       <li class="btn btn-primary mt-2 w-100 active">
                           Home
                       </li>
                       <li class="btn btn-primary mt-2 w-100">
                           My Subjects
                       </li>
                       <li class="btn btn-primary mt-2 w-100">
                           My Subjects
                       </li>
                       <li class="btn btn-primary mt-2 w-100">
                           My Subjects
                       </li>
                       <li class="btn btn-primary mt-2 w-100">
                           Profile
                       </li>
                   </ul>
               </div>
               <div class="border-left col-sm-9">
                   <div class="container navbutton bg-success">
                       <h1>Toogle </h1>
                   </div>
                   <div>
                       <h2><a href = "logout.php">Sign Out</a></h2>
                   </div>
                   <?php
                       $profuserid=$_SESSION['userid'];
                       $sub_sql = "SELECT * FROM SUBJECT_TABLE WHERE prof_userid='$profuserid' ";
                       $sub_res = mysqli_query($conn, $sub_sql);
                       while($row = mysqli_fetch_assoc($sub_res)){
                           echo $row['subject'];
                       }
                   ?>
               </div>
           
           </body>
           </html>
           