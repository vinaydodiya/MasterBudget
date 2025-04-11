<?php
    include "connect.php";
    
    $s = "select * from bank_details";
    $r = mysqli_query($con,$s);
    $cntr = 0;  
    /*echo $_SESSION['MyEmail'];*/
    while($res = mysqli_fetch_array($r)){
        if($_SESSION['MyEmail'] == $res['email'])
        {
            $cntr = 1;
        }
    }
    
    if($cntr != 1){

        insertbank();
    }
    else{
        echo "<script>alert('Bank Account Already Inserted...')</script>";
        echo "<script> window.history.back(); </script>";
    }
    
    
    function insertbank(){
        include "connect.php";
        $bname = $_POST['bankName'];
        $accno = $_POST['accno'];
        $ifsc = $_POST['ifsc'];
        $email =$_SESSION['MyEmail'];
        $phno = $_POST['phno'];
        $addr = $_POST['addr'];
        $pin = $_POST['pincode'];
        $dt = date("Y-m-d");

        $_SESSION['Accno'] = $accno;
        $i = "insert into bank_details values('$bname','$accno','$ifsc','$email','$phno','$addr',$pin,'$dt')";
        mysqli_query($con,$i)
        or
        die("Error in Add Bank Details.");
        echo "<script>alert('Bank Account Inserted..')</script>";
        
        echo "<script> window.open('mainpage.html','_self'); </script>";
    }

?>