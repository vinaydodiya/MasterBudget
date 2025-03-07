<?php
    $con = mysqli_connect("localhost","root","")
    or
    die("Error in database connect");

    mysqli_select_db($con,"masterbudget")
    or
    die("Error in database selection");
    if(isset($_SESSION))
    {
        /*echo"Session is Started";*/
    }
    else{
        session_start();
    }
?>