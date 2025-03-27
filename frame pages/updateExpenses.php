<?php 
    include "connect.php";

    $id = $_POST['tranID'];
    $Accno = $_SESSION['Accno'];
    $s = "Select * from expense where account = $Accno and tran_id = $id";
    $q = mysqli_query($con,$s)
    or
    die("Error in expense data selection");

    if (isset($_POST['UPDATE'])) {

        while($res = mysqli_fetch_array($q)){
            $nameE = $res['tranname'];
            $categoryE = $res['category'];
            $amountE = $res['amount'];
            $methodE = $res['method'];
            $dateE = $res['trandate'];
            echo $nameE;
            echo $categoryE;
            echo $amountE;
            echo $methodE;
            echo $dateE;
        }
        // $id = $_POST['tranID'];
        // $name = $_POST['tranName'];
        // $category = $_POST['category'];
        // $amount = $_POST['amount'];
        // $method = $_POST['method'];
        // $date = $_POST['trandate'];
       
        isset($_POST['tranName']) ? $name = $_POST['tranName'] : $name = $nameE;
        isset($_POST['category']) ? $category = $_POST['category'] : $category = $categoryE;
        isset($_POST['amount']) ? $amount = $_POST['amount'] : $amount = $amountE;
        isset($_POST['method']) ? $method = $_POST['method'] : $method = $methodE;
        isset($_POST['trandate']) ? $date = $_POST['trandate'] : $date = $dateE;
        date_default_timezone_set('Asia/Kolkata');
        $dt = date("Y-m-d h:i:sa");
        
        
        // update the expense data
        $sql = "update expense set tranname = '$name', category = '$category', amount = $amount, method = '$method', trandate = '$date' where tran_id = $id and account = $Accno ";
        $q = mysqli_query($con,$sql)
        or 
        die("Error in update expense data");

        // update the transaction data
        $sql = "update transactions set tranname = '$name', cetegory = '$category', amount = $amount, method = '$method', tran_date = '$date', date = '$dt' where tran_id = $id and account = $Accno";
        $q = mysqli_query($con,$sql)
        or
        die("Error in update transaction data");
        // header("location:expense.php");
        echo "<script>
            alert('Updated Successfully');
            window.history.back();
        </script>";
    }
    if (isset($_POST['DELETE'])) {
        $id = $_POST['tranID'];
       
        // delete the expense data
        $sql = "delete from expense where tran_id = $id and account = $Accno";
        $q = mysqli_query($con,$sql)
        or 
        die("Error in delete expense data");

        // delete the transaction data
        $sql = "delete from transactions where tran_id = $id and account = $Accno";
        $q = mysqli_query($con,$sql)
        or
        die("Error in delete transaction data");
        //header("location:expense.php");
        echo "<script>
            alert('Deleted Successfully');
            window.history.back();
        </script>";
    }
?>