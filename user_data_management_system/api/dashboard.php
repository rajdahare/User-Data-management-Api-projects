<?php 

session_start();
include('./connect.php');

if(!isset($_SESSION['studentdata'])){
    header("location: ../login.html");
}

$studentdata = $_SESSION['studentdata'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<center><h1 style="text-align: center; color: white; font-family: cursive">User Dashboard</h1></center>
<hr>

<div style="display:flex; flex:wrap; padding:5px; gap: 10px;">
<div id="profile" style="background-color:skyblue; margin-top:50px; width:30%; padding:20px; border-radius:10px; float:left;">
    
    <center><img src="./uploads/<?php echo $studentdata['photo'] ?>" heigt="100" width="100" style="border-radius:10px;"></center><br><br>
    <b>S_id: </b><?php echo $studentdata['s_id'] ?><br><br>
    <b>Name: </b><?php echo $studentdata['name'] ?><br><br>
    <b>Email: </b><?php echo $studentdata['email'] ?><br><br>
    <!-- <b>Homework:</b><input type="file" value="submit"><br><br> -->
    <!-- <center><button style="width:100px; hight:200px; padding:10px; border-radius:10px; background-color: rgb(235, 198, 143);"><a href="../api/homework.php" id="homework">Homework</a></button></center><br> -->
    <center><button style="width:100px; hight:200px; padding:10px; border-radius:10px; background-color: rgb(235, 198, 143);"><a href="../logout.php" id="homework">Logout</a></button></center>
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
            $query = "SELECT * FROM employee";
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
                            <!-- <th><a href="./edithomework.php?id=<?php echo $row['h_id'] ?>">edit</a> | <a href="./deletehomework.php?id=<?php echo $row['h_id'] ?>">delete</a></th> -->
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