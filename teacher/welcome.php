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
               <li class="nav-item active">
                  <a class="nav-link" href="welcome.php">Profile <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
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
      </div>    </nav>
</body>
</html>