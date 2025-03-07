<?php
    include "connect.php";
    if(isset($_SESSION))
    {
        /*echo"Session is Started";*/
    }
    else{
        session_start();
    }
    $ano = $_SESSION['Accno'];
    $cet = $_POST['txtcet'];
    $rtype = $_POST['rtype'];
    $dt = date("Y-m-d h:i:sa");

    $stid = "select * from cetegory order by cetegory_ID "; 
    $rtid = mysqli_query($con,$stid)
    or
    die("Error in Tran_id select");
    while($rt = mysqli_fetch_array($rtid))
    {
        $cetId = $rt['cetegory_ID'];
    }
    
    if($cetId==0){
        $cetId = 101;
    }
    $_SESSION['cetId'] = $cetId;

    $cetId = ($_SESSION['cetId'] + 1);

    $i = "insert into cetegory values($cetId,'$ano','$cet','$rtype','$dt')";
    mysqli_query($con,$i)
    or 
    die("Error in category Insert");
    echo "<script>alert('Category Inserted')
        window.history.go(-2);
    </script>";
?>