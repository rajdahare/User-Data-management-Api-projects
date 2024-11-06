<?php
session_start();
include('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];



$check = mysqli_query($connect, "SELECT * FROM employee WHERE email='$email' AND password='$password' ");

if(mysqli_num_rows($check)>0){

    $studentdata = mysqli_fetch_array($check);
    $_SESSION['studentdata'] = $studentdata;

    $admindata = mysqli_fetch_array($check);
    $_SESSION['admindata'] = $admindata;

    if($role=='admin'){

        echo '
            <script>
                window.location = "./admin/admindashboard.php";
            
            </script>
        ';
    }elseif($role=='user'){
        echo '
            <script>
                window.location = "./dashboard.php";
            
            </script>
        ';
    }
}else{
    echo '
        // <script>
        //     alert("Invalid credentials or user not found!");
        //     window.location = "../";
        // </script>
    ';
}

?>