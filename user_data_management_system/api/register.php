<?php 

include('./connect.php');

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$address = $_POST['address'];
$role = $_POST['role'];


if($password==$cpassword){
    move_uploaded_file($tmp_name, "./upload/$image");
    $insert = mysqli_query($connect, "INSERT INTO employee(name,username,email,password,photo,address,role)
              VALUES('$name','$username','$email','$password','$image','$address','$role')");
    
    if($insert){
        if($role="User"){
            echo '
                <script>
                    alert("Registration Sucessfull");   
                    window.location = "../login.html";
                </script>
            ';
        }elseif($role="Admin"){
            echo '
                <script>
                    alert("Registration Sucessfull");   
                    window.location = "./admin/adminlogin.html";
                </script>
            ';
        }
    }else{
        echo '
            <script>
                alert("some error occured !");
                window.location = "../";
            </script>
        ';
    }

}else{
    echo '
        $cpassword and $password
        <script>
            alert(" $password and confirm $cpassword does not match!");
            window.location = "../index.html";
        </script>
    ';
}

?>

