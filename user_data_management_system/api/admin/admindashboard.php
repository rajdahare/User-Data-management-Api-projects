<?php 

session_start();
// $studentdata = $_SESSION['studentdata'];
include('../connect.php');

// if(!isset($_SESSION['admindata'])){
//     header("location: ../login.php");
// }

if(!isset($_SESSION['studentdata'])){
    header("location: ../login.php");
}

$studentdata = $_SESSION['studentdata'];
// $admindata = $_SESSION['admindata'];

if(isset($_POST['create_homework'])){
    $query = "INSERT INTO homework VALUES(null,'$_POST[id]','$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
    $query_run = mysqli_query($connect,$query);
    if($query_run){
        echo '
            <script>
                alert("Task created Sucessfull");
                window.location = "./admindashboard.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Please try again");
                window.location = "./createhomework.php";
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
    <title >Admin Dashboard</title>
    <!-- <?php include('../connection.php'); ?> -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

<center><h1 style="text-align: center; color: white; font-family: cursive">Admin Dashboard</h1></center>
<hr>

<div style="display:flex; flex:wrap; padding:5px; gap: 10px;">

<div id="profile" style="background-color:skyblue; margin-top:50px; width:30%; padding:20px; border-radius:10px; float: left;">
    <center><img src="../upload/<?php echo $studentdata['photo'] ?>" heigt="100" width="100" style="border-radius:10px;"></center><br>
    <b>Id: </b><?php echo $studentdata['s_id'] ?><br>
    <b>Name: </b><?php echo $studentdata['name'] ?><br>
    <b>Email: </b><?php echo $studentdata['email'] ?><br><br>
    <!-- <b>Homework:</b><input type="file" value="submit"><br><br> -->
    <center><button style="width:200px; hight:200px; padding:10px; border-radius:10px; background-color: rgb(235, 198, 143); hover:green; "><a href="./import_csv.php" id="managehomework" class="link">Import CSV File</a></button></center><br>
    <center><button style="width:200px; hight:200px; padding:10px; border-radius:10px; background-color: rgb(235, 198, 143); hover:green; "><a href="./createhomework.php" id="homework" class="link">Create Task</a></button></center><br>
    <center><button style="width:200px; hight:200px; padding:10px; border-radius:10px; background-color: rgb(235, 198, 143); hover:green; "><a href="./managehomework.php" id="managehomework" class="link">Manage Task</a></button></center><br>
    <center><button style="width:200px; hight:200px; padding:10px; border-radius:10px; background-color: rgb(235, 198, 143); hover:green; "><a href="../../logout.php" id="managehomework" class="link">Logout</a></button></center>

</div>
<div style="background-color:skyblue; width:70%; margin-top:50px; border-radius:10px; float: right;">
    <table class="table" style="background-color:whitesmoke; width:65vw; margin:10px; border-radius:2px; margin-left:6px;">
        <tr>
            <th>S.No</th>
            <th>ID</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Role</th>
        </tr>
        <?php
            $sno = 1;
            $query = "SELECT * FROM employee WHERE role='user'";
            $query_run = mysqli_query($connect,$query);
            if(mysqli_num_rows($query_run)){
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                        <tr>
                            <th><?php echo $sno ?></th>
                            <th><?php echo $row['s_id'] ?></th>
                            <th><?php echo $row['name'] ?></th>
                            <th><?php echo $row['username'] ?></th>
                            <th><?php echo $row['email'] ?></th>
                            <th><?php echo $row['address'] ?></th>
                            <th><?php echo $row['role'] ?></th>
                            <!-- <th><a href="./edithomework.php?id=<?php echo $row['s_id'] ?>">edit</a> | <a href="./deletehomework.php?id=<?php echo $row['s_id'] ?>">delete</a></th> -->

                        </tr>
                    <?php
                    $sno = $sno + 1;
                }
            }
        ?>
    </table>
</div>

</div>

    
</body>
</html>