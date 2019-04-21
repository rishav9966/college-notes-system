<?php
 include('session.php');
 require('connect.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Member </title>
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
        <script type="text/javascript" src="jquery.js"></script>
        <script>
            $(document).ready(function(){
            $("#teacher").click(function(){
                $("#studentform").slideUp();
                $("#teacherform").slideToggle(); 
                });
            });
            $(document).ready(function(){
                $("#student").click(function(){
                    $("#teacherform").slideUp();
                    $("#studentform").slideToggle();
                    
                });
            });
        </script>
        
    </head>
    <body class="bg-info">

        <?php
            if(empty($_GET['college']) || empty($_GET['dept'])){
                $msg = "try again by clicking add teacher/student button";
                header("Location:welcome.php?msg=$msg");
            }else{
                $college = $_GET['college'];
                $dept = $_GET['dept'];
                $sql_dept_id = " SELECT dept_id FROM DEPT_LIST WHERE faculty='$college' AND dept = '$dept' " ;
                $dept_id_result = mysqli_query($conn, $sql_dept_id);
                $resultcount = mysqli_num_rows($dept_id_result);
                while($dept_id_row = mysqli_fetch_assoc($dept_id_result)){
                    $dept_id = $dept_id_row['dept_id'];
                }
            }
        ?>
        <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="btn-group row m-0 p-3 w-100">
            <div class="col-sm-6 text-center text-light p-2">
                <div><?php echo $college;?></div>
            </div>
            <div class="col-sm-6 text-center text-light p-2">
                <div><?php echo $dept;?></div>
            </div>
        </div>

        <div class="btn-group row m-0 p-3 w-100">
            <div class="col-sm-6 text-center p-2">
                <button id="teacher">Add Teacher</button>
            </div>
            <div class="col-sm-6 text-center p-2">
                <button id="student">Add Student</button>
            </div>
        </div>
        

                            <!--add teacher--> 
        <div id="teacherform" style="display:none;">
            <form action="form_handle.php" method="POST">
                <input type="hidden" name="college" value="<?php echo $college;?> ">
                <input type="hidden" name="dept" value="<?php echo $dept;?> ">
                <input type="hidden" name="dept_id" value="<?php echo $dept_id;?> ">
                prof_name<input type="text" name="prof_name" required>
                <br>userid<input type="text" name="userid" required>
                <input type="hidden" name="password" value="<?php $x=1; echo $x; ?>" required>
                <input type="submit" name="addteachersubmit" value="submit">
            </form>
        </div><br>



                        <!--add student-->
        <div id="studentform" style="display:none;">
            <form action="form_handle.php" method="POST">
                <div class="row w-100 m-0">
                    <div class="form-group col-sm-12">
                        <label for="course">Course:</label>
                        <select class="form-control" name="dept" id="viewdept">
                            <option selected="" disabled="">SELECT COURSE</option>
                            <?php
                                $sql_dept_id = " SELECT dept_id FROM DEPT_LIST WHERE faculty='$college' AND dept = '$dept' " ;
                                $dept_id_result = mysqli_query($conn, $sql_dept_id);
                                $resultcount = mysqli_num_rows($dept_id_result);
                                if($resultcount == 1){
                                    while($dept_id_row = mysqli_fetch_assoc($dept_id_result)){
                                        $dept_id = $dept_id_row['dept_id'];
                                        $course_sql = " SELECT * FROM COURSE WHERE dept_id='$dept_id' " ;
                                        $course = mysqli_query($conn, $course_sql);
                                        while($row = mysqli_fetch_assoc($course)){
                            ?>
                                <option><?php echo $row['course'] ?></option>
                            <?php
                                        }
                                    }
                                }else{
                                    $msg = "something error";
                                    header("Location:addmember.php?msg=$msg");
                                    exit();
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row w-100 m-0">
                    <div class="form-group col-sm-6">
                        <label for="name">Roll_No:</label>
                        <input type="text" class="form-control" name="srollno" placeholder="Enter Your Roll_No">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="sname" placeholder="Enter Your Name">
                    </div>
                </div>
                <div class="row w-100 m-0">
                    <div class="form-group col-sm-4">
                        <label for="name">Email_Id:</label>
                        <input type="email" class="form-control" name="semail" placeholder="Enter Your E-mail">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="name">Mobile_No:</label>
                        <input type="tel" class="form-control" name="smobile" placeholder="Enter Your Mobile No">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="name">Password:</label>
                        <input type="password" class="form-control" name="spassword" placeholder="Enter Your Password">
                    </div>
                </div>
                <div class="row w-100 m-0">
                    <div class="form-group col-sm-4">
                    </div>
                    <div class="form-group col-sm-4 text-center">
                        <input type="submit" class="btn btn-primary" name="submit" value="submit">
                    </div>
                    <div class="form-group col-sm-4">
                    </div>
                </div>
            </form>
        </div><br>

        <div class="container bg-danger text-light">
            <?php if(isset($_GET['msg'])){
                echo $_GET['msg'];
                }
            ?>
        </div>

    </body>
    
</html>