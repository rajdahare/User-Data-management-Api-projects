<?php



include('../connect.php');
session_start();


$email = $_POST['email'];
$password = $_POST['password'];


$check = mysqli_query($connect, "SELECT * FROM employee WHERE email='$email' AND password='$password' ");

if(mysqli_num_rows($check)>0){
    $admindata = mysqli_fetch_array($check);

    $_SESSION['admindata'] = $admindata;
    

    echo '
        <script>
            window.location = "./admindashboard.php";
        </script>
    ';
}else{
    echo '
        // <script>
        //     alert("Invalid credentials or user not found!");
        //     window.location = "./adminlogin.html";
        // </script>
    ';
}

?>







