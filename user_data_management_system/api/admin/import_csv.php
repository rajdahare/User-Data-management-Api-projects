<?php

include('../connect.php');

if(isset($_POST['submit'])){
    if($_FILES['file']['name']){
        $filename = explode(".",$_FILES['file']['name']);

        if($filename[1] == "csv"){
            $handle = fopen($_FILES['file']['tmp_name'],'r');

            while($data = fgetcsv($handle)){
                $name=$data[0];
                $email=$data[1];
                $username=$data[2];
                $address=$data[3];
                $role=$data[4];

                $insert = mysqli_query($connect, "INSERT INTO users(name,email,username,address,role)
                    VALUES('$name','$email','$username','$address','$role')");
            }
            fclose($handle);
            echo '
                <script>
                    alert("Import Sucessfull");   
                    window.location = "./admindashboard.php";
                </script>
            ';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMPORT CSV fILE</title>
    <?php include('../connection.php'); ?>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <div id="container" style="padding: 200px 80px;">
        <div class="col-sm-6 pull-left">
            <div class="well well-sm col-sm-12">
                <div class="alert alert-success d-none"></div>
                <div class="alert alert-danger d-none"></div>
                <form method="post" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="file" name="file" id="file" placeholder=""Select CSV file" class="form-control" />
                        <input class="btn btn-primary" type="submit" name="submit" id="importcsv" value="Import">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <form method="post" enctype="multipart/form-data">
        
            <input type="file" name="file" id="file" placeholder=""Select CSV file" class="form-control" />
            <input type="submit" name="submit" value="Import">        
    </form> -->
</body>
</html>