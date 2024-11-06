<?php

    include('../connect.php');
    $query = "DELETE FROM homework WHERE h_id=$_GET[id]";
    $query_run = mysqli_query($connect,$query);
    if($query_run){
        echo '
            <script>
                alert("Homework deleted Sucessfull");
                window.location = "./admindashboard.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("please try again");
                window.location = "./admindashboard.php";
            </script>
        ';
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('../api/connection.php')?>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>delete task</h1>
</body>
</html>