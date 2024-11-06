<?php 

include('../api/connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];



if($password==$cpassword){
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO admin(name,email,password,photo)
              VALUES('$name','$email','$password','$image')");
    if($insert){
        echo '
            <script>
                alert("Registration Sucessfull");
                window.location = "./adminlogin.html";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("some error occured !");
                window.location = "./teacher.html";
            </script>
        ';
    }

}else{
    echo '
        <script>
            alert("password and confirm password does not match!");
            window.location = "../routes/register.html";
        </script>
    ';
}

?>