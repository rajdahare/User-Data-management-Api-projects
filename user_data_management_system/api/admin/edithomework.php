<?php
    include('../connect.php');
    if(isset($_POST['edit_homework'])){
        $query = "UPDATE homework SET s_id='$_POST[id]',description='$_POST[description]',start_date='$_POST[start_date]',end_date='$_POST[end_date]' WHERE h_id='$_GET[id]'";
        $query_run = mysqli_query($connect, $query);
        if($query_run){
            echo '
            <script>
                alert("update Sucessfull");
                window.location = "./admindashboard.php";
            </script>
        ';
        }else{
            echo '
            <script>
                alert("Try again");
                window.location = "./admindashboard.php";
            </script>
        ';
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('../connection.php')?>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <center><h1">Edit task</h1></center>
    <hr><br>
    <div class="row">
        <div class="col-md-4 m-auto" style="color:white;"><br>
            <h3 style="color:black;">edit the task</h3>
            <?php 
                session_start();
                $query = "SELECT * FROM homework WHERE h_id=$_GET[id]";
                $query_run = mysqli_query($connect,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Select Student :</label>
                            <select class="form-control" name="id" required>
                                <option>-select-</option>
                                <?php                   
                                    $query1 = "SELECT * FROM employee WHERE role='user'";
                                    $query_run1 = mysqli_query($connect,$query1);
                                    if(mysqli_num_rows($query_run)){
                                        while($row1 = mysqli_fetch_assoc($query_run1)){
                                            
                                            ?>
                                            <option value="<?php echo $row['s_id'] ?>"><?php echo $row1['name'] ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea class="form-control" row="3" cols="50" name="description" required><?php echo $row['description'] ?></textarea>

                        </div>
                        <div class="form-group">
                            <label>Start date:</label>
                            <input type="date" class="form-control" name="start_date" value="<?php echo $row['start_date'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>End date:</label>
                            <input type="date" class="form-control" name="end_date" value="<?php echo $row['end_date'] ?>" required>
                        </div><br><br>
                        <input type="submit" class="btn btn-warning" name="edit_homework" value="update">
                    </form>
                    <?php
                }
            ?>
        </div>

    </div>
</body>
</html>