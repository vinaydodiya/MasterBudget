<?php
    include "connect.php";

    $email = $_POST['iemail'];
    $pass = $_POST['ipassword'];

    $u = "update accounts set Password='$pass' where Email = '$email'";
    mysqli_query($con,$u)
    or
    die("Error in Forget Password");
    
    echo "<script>";
    echo "alert('Password Changed..')";
    echo "</script>";

    include "login.html";
?>