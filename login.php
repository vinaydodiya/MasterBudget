<?php
    include "connect.php";
    
    
    $email = $_POST['iemail'];
    $pass = $_POST['ipassword'];
    $_SESSION["MyEmail"] = $email;
    
    $ss = "select accountNo from bank_details where email = '$email'";
    $rr = mysqli_query($con,$ss)
    or
    die("Error in session account no");

    $_SESSION['Accno'] ='';
    while($res = mysqli_fetch_array($rr))
    {
        $_SESSION["Accno"] = $res['accountNo'];
        
    }

    // --------------------  begin currency symbol -----------------------
    $scm = "select * from accounts a, currency c where a.country = c.country_name and a.Email = '$email'";
    $qscm = mysqli_query($con,$scm)
    or 
    die('Error in currency symbol');
    while($rscm = mysqli_fetch_array($qscm))
    {
        $_SESSION['country_symbol'] = $rscm['symbol'];
    }
    // -------------------  End currency symbol  -------------------


// ---------------------  Check Bank Account -----------------------
//  ---------Bank Add-----------
$s = "select * from bank_details";
$r = mysqli_query($con,$s);
$cntr = 0;  
         /*echo $_SESSION['MyEmail'];*/
         while($res = mysqli_fetch_array($r))
         {
             if($_SESSION['MyEmail'] == $res['email'])
             {
                 $cntr = 1;
             }
             
        }
// ------------------ End Check Bank Account -----------------------

//-------------------- select User from databases --------------
    $s = "select * from accounts";
    $q = mysqli_query($con ,$s)
    or 
    die("Error in Login Selection");
    $adminlogin = false;
    $emailcheck = false;
    $passcheck = false;
    while($r = mysqli_fetch_array($q)){
        if($email == 'Admin@gmail.com' && $pass == 'Admin123'){
            $adminlogin = true;
        }
        if($email == $r['Email']){
            $emailcheck = true;
        }
        if($pass == $r['Password']){
            $passcheck = true;
        }
    }
    // check if Admin
    // go to Admin Page
    if ($adminlogin == true){
        echo "<script> 
        window.close();
        window.open('Admin User/AdminMainPage.php','_self'); </script>";
    }
    elseif($emailcheck == true)
    {
        if($passcheck = true){
            echo "<script>alert('Login Successfull..')</script>";

            echo "<script> 
            window.close();
            window.open('mainpage.html','_self'); </script>";

        }
        else{
            echo "<script>alert('Wrong Password!')</script>";
            include "login.html";
        } 
    }
    else{
        echo "<script>alert('User not Exist! Please Register..')</script>";
        include "signup.php";
    }
    
    
//----------------- End select User from databases ------------

?>