<?php
   require('connect.php');
   $query="SELECT * FROM SUBJECT_TABLE";
   $result=mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SEMESTER DETAILS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="#">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="jquery.js"></script>
    </head>
    <body>
        <form class="form-group" style="padding-top: 150px" action="hello.html">
            <div class="searchbox3 container p-9 col-auto">
                <select class="form-control" required>
                    <option selected="" disabled="">SELECT SUBJECT</option>
                    <option value="mathematics 1">MATHEMATICS 1</option>
                    <option value="mathematics 1">MATHEMATICS 2</option>
                    <option value="mathematics 1">MATHEMATICS 3</option>
                    <option value="PHYSICS 1">PHYSICS 1 </option>
                </select>
                
               <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary mb-2" >Submit</button>
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead class="table-primary text-center font-weight-bold">
                <th colspan="4">SUBJECT NAME</th>
            </thead>
            <thead>
                <tr>
                    <th scope="col">sub_id</th>
                    <th scope="col">sem_id</th>
                    <th scope="col">subject</th>
                    <th scope="col">profressor</th>
                </tr>
            </thead>
            <?php
            while($rows=mysqli_fetch_assoc($result))
              {
            ?>
             <tr>
                <td><?php echo $rows['sub_id']; ?></td>
                <td><?php echo $rows['sem_id']; ?></td>
                <td><?php echo $rows['subject']; ?></td>
                <td><?php echo $rows['professor']; ?></td>
             </tr> 
            <?php
              }
            ?>
        </table>
        
    </body>
</html>
