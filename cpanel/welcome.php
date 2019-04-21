<?php
 include('session.php');
require('connect.php');
?>
<html>
<head>
    <title>home</title>
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
    <style>
        .td{
            word-break: break-word;
        }
    </style>
</head>
<body class="bg-info">

                    <!--Navigation-->

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


    <!--<div class="container-fluid row bg-primary w-100">
        <button class="cols sm-3 ml-4" id="addcollege">Add College</button>
        <button class="cols sm-3" id="adddept">Add Department</button>
        <button class="cols sm-3" id="addcourse">Add Course</button>
        <button class="cols sm-3" id="addsem">Add Sem</button>
    </div>-->


                            <!-- BUTTONS ON MAIN SCREEN  -->

    <div class="form-group row m-0 p-3 w-100">
            <div class="col-sm-4 p-3">
            <button id="addcollege">Add College</button>
            </div>
            <div class="col-sm-4 p-3">
            <button id="adddept">Add Department</button>
            </div>
            <div class="col-sm-4 p-3">
            <button id="addcourse">Add Course</button>
            </div>
    </div>
    <div class="form-group row m-0 p-3 w-100">
            <div class="col-sm-4">
            <button id="addteacher">Add Teacher/Student</button>
            </div>
    </div>


                    <!-- FORM TO ADD COLLEGE  -->

    <div id="addcollegeform" style="display:none;">
        <form action="form_handle.php" method="POST">
            College Name<input class="form-control" type="text" name="college" required>
            <input type="submit" name="submitcollege" value="submit">
        </form>
    </div><br>


                                <!-- FORM TO ADD DEPT  -->
    
    <div id="adddeptform" style="display:none;">
        <form action="form_handle.php" method="POST">
            select college
            <select class="form-control" name="college" id="course">
                <option selected="" disabled="">SELECT COLLEGE</option>
                <?php
                    $sql_college = " SELECT * FROM COLLEGE_LIST " ;
                    $college_result= mysqli_query($conn, $sql_college) ;
                    while($college_row = mysqli_fetch_assoc($college_result)){
                ?>
                <option><?php echo $college_row['faculty']; ?></option>
                <?php
                    }
                ?>
            </select>
            Department Name
            <input class="form-control" type="text" name="dept" placeholder="DEPT OF ***" required>
            <input type="submit" name="submitdept" value="submit">
        </form>
    </div><br>


                                <!-- FORM TO ADD course  -->
    
    <div id="addcourseform" style="display:none;">
        <form action="form_handle.php" method="POST">
            select college
            <select class="form-control" name="college" id="showcollege">
                <option selected="" disabled="">SELECT COLLEGE</option>
                <?php
                    $sql_college = " SELECT * FROM COLLEGE_LIST " ;
                    $college_result= mysqli_query($conn, $sql_college) ;
                    while($college_row = mysqli_fetch_assoc($college_result)){
                ?>
                <option><?php echo $college_row['faculty']; ?></option>
                <?php
                    }
                ?>
            </select>
            select Department
            <select class="form-control" name="dept" id="showdept">
                <option selected="" disabled="">SELECT DEPARTMENT</option>
            </select>
            Course Name<input class="form-control" type="text" name="course" required>
            Number Of Sem<input class="form-control" type="number" name="sem" required>
            <input type="submit" name="submitcourse" value="submit">
        </form>
    </div><br>


                                <!-- FORM TO ADD teacher/studnet  -->

    <div id="addteacherform" style="display:none;">
        <form action="form_handle.php" method="POST">
            select college
            <select class="form-control" name="college" id="viewcollege">
                <option selected="" disabled="">SELECT COLLEGE</option>
                <?php
                    $sql_college = " SELECT * FROM COLLEGE_LIST " ;
                    $college_result= mysqli_query($conn, $sql_college) ;
                    while($college_row = mysqli_fetch_assoc($college_result)){
                ?>
                <option><?php echo $college_row['faculty']; ?></option>
                <?php
                    }
                ?>
            </select>
            select Department
            <select class="form-control" name="dept" id="viewdept">
                <option selected="" disabled="">SELECT DEPARTMENT</option>
            </select>
            <input type="submit" name="submitteacher" value="submit">
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
