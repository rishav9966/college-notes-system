<?php
 include('session.php');
 include('connect.php');

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
        .td{
            word-break: break-word;
        }
    </style>
   <script type="text/javascript">
        <?php
            if(empty($_SESSION['email'])){
        ?>
        <?php
            }
        ?>
    </script>
</head>
<body class="bg-info">

        <?php
            if(empty($_SESSION['email'])){
                echo "update email";
            }
        ?>

    <div id="emailform" class="container-fluid loginbox rounded border border-primary " style="max-width: 300px; display:none;">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="email" name="email" placeholder="email-id">
            <input type="submit" value="submit" name="emailsubmit">
        </form>
    </div>


                    <!--Navigation-->

    <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark">
        <a class="navbar-brand active" href="welcome.php">ERP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="welcome.php">Profile <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="homepage.php">Home</a>
                </li>
                <?php
                    if($_SESSION['role'] == "dean"){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="dean/dean_panel.php">Dean Panel</a>
                </li>
                <?php
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"">Logout</a>
                </li>
            </ul>
        </div>
    </nav>



    <div class="container-fluid">
        <div class="container text-center font-weight-bold mt-2 mb-1">
            <h2 class="text-light">
                WELCOME <?php echo $_SESSION['prof_name']; ?>
            </h2>
        </div>
        <?php
            $profuserid=$_SESSION['userid'];
            $sub_sql = "SELECT * FROM SUBJECT_TABLE WHERE prof_userid='$profuserid' ";
            $sub_res = mysqli_query($conn, $sub_sql);
        ?>



                            <!--table to show subject list-->
        <table class="table table-danger" style="width:100%;">
            <thead class="table-dark">    
                <tr class="border">
                    <th class="py-2">SUBJECT</th>
                    <th class="py-2">SEM</th>
                    <th class="py-2">COURSE</th>
                    <th class="py-2">DEPT</th>
                    <th class="py-2"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($sub_res)){
                ?>
                <tr class="border">
                    <td class="py-2 td"><?php echo $row['subject']; ?></td>
                    <?php 
                        $sem_id = $row['sem_id'];
                        $sem_sql = "SELECT * FROM SEMESTER WHERE sem_id='$sem_id' ";
                        $sem_res = mysqli_query($conn, $sem_sql);
                        while($sem_row = mysqli_fetch_assoc($sem_res)){
                    ?>
                    <td class="py-2 td"><?php echo $sem_row['sem']; ?></td>
                    <?php 
                        $course_id = $sem_row['course_id'];
                        $course_sql = "SELECT * FROM COURSE WHERE course_id='$course_id' ";
                        $course_res = mysqli_query($conn, $course_sql);
                        while($course_row = mysqli_fetch_assoc($course_res)){
                    ?>
                    <td class="py-2 td"><?php echo $course_row['course']; ?></td>
                    <?php 
                        $dept_id = $course_row['dept_id'];
                        $dept_sql = "SELECT * FROM DEPT_LIST WHERE dept_id='$dept_id' ";
                        $dept_res = mysqli_query($conn, $dept_sql);
                        while($dept_row = mysqli_fetch_assoc($dept_res)){
                    ?>
                    <td class="py-2 td"><?php echo $dept_row['dept']; ?></td>

                    <td class="py-1">
                        <a class="btn btn-info" href='uploadfile.php?subject=<?php echo $row['subject'];?>&sem=<?php echo $sem_row['sem'];?>&course=<?php echo $course_row['course'];?>&dept=<?php echo $dept_row['dept'];?>'>

                            Upload

                        </a>
                    </td>
                    <?php 
                        }
                    ?>
                    <?php 
                        }
                    ?>
                    <?php 
                        }
                    ?>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
   </div>




    <div class="container bg-danger">
            <?php if(isset($_GET['msg'])){
                echo $_GET['msg'];
                }
            ?>
    </div>

</body>
</html>
