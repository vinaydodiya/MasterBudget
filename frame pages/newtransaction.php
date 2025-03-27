

<?php
    include "connect.php";
    $acc = $_SESSION['Accno'];
    $tname = $_POST['tranname'];
    $tcet = $_POST['tcet'];
    $tdate = $_POST['tdate'];
    $ttype = $_POST['ttype'];
    $tmethod = $_POST['tmethod'];
    $amt = $_POST['tamount'];
    $tarea = $_POST['txtarea'];
    $d = date("Y-m-d ");
    date_default_timezone_set('Asia/Kolkata');
    $dt = date("Y-m-d h:i:sa");


    $stid = "select * from transactions order by tran_id "; 
    $rtid = mysqli_query($con,$stid)
    or
    die("Error in Tran_id select");
    while($rt = mysqli_fetch_array($rtid))
    {
        $tid = $rt['tran_id'];
    }
    
    if($tid==0){
        $tid = 1020250001;
    }
    $_SESSION['tid'] = $tid;

    $tid = ($_SESSION['tid'] + 1);
    $i = "Insert into transactions values('$acc',$tid,'$tname','$tcet','$tdate','$ttype','$tmethod',$amt,'$tarea','$dt')";
    mysqli_query($con,$i)
    or
    die("Error in Insert Data");
    

    $ibal = "select amount from income where account = '$acc'";
    $qi = mysqli_query($con,$ibal);
    $ebal = "select amount from Expense where account = '$acc'";
    $qe = mysqli_query($con,$ebal);
    $ib = 0;
    $eb = 0;
    while($ri = mysqli_fetch_array($qi))
    {
        $ib = $ib + $ri['amount'];
    }
    while($re = mysqli_fetch_array($qe))
    {
        $eb = $eb + $re['amount'];
    }
    if ($ttype =='Income'){
        $incm = "Insert into income values('$acc',$tid,'$tname','$tcet','$ttype','$tmethod','$tdate',$amt,($ib + $amt))";
        mysqli_query($con,$incm);
    }
    if($ttype =='Expense'){
        $expc = "Insert into Expense values('$acc',$tid,'$tname','$tcet','$ttype','$tmethod','$tdate',$amt,($eb + $amt))";
        mysqli_query($con,$expc);
    }
    
    
    echo "<script>alert('Transaction Successfull...')
    window.history.go(-2);
    </script>";
?>