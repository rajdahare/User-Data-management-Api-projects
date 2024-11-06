<?php 

    $connect = mysqli_connect("localhost","root","root","management_data");

    if($connect){
        // echo "Database connected Successfully";
    }else{
        echo "Not Connected!";
    }

?>