<?php
    include "connect.php";

    $name = $_POST['iname'];
    $email = $_POST['iemail'];
    $ct = $_POST['ict'];
    $pass = $_POST['ipassword'];

    $insert = "Insert into accounts values('$name','$email','$ct','$pass')";

    mysqli_query($con, $insert)
    or
    die("Error in Insert Data");

    echo "<script>alert('Account Created')</script>";

    include "addBank.html";

?>