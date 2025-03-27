<?php 
    include "connect.php";

    if (isset($_POST['UPDATE'])) {
        $id = $_POST['tranID'];
        $name = $_POST['tranName'];
        $category = $_POST['category'];
        $amount = $_POST['amount'];
        $method = $_POST['method'];
        $date = $_POST['trandate'];
        $Accno = $_SESSION['Accno'];
        date_default_timezone_set('Asia/Kolkata');
        $dt = date("Y-m-d h:i:sa");
        // update the income data
        $sql = "update income set tranname = '$name', category = '$category', amount = $amount, method = '$method', trandate = '$date' where tran_id = $id and account = $Accno";
        $q = mysqli_query($con,$sql)
        or 
        die("Error in update income data");

        // update the transaction data
        $sql = "update transactions set tranname = '$name', cetegory = '$category', amount = $amount, method = '$method', tran_date = '$date', date = '$dt' where tran_id = $id and account = $Accno";
        $q = mysqli_query($con,$sql)
        or
        die("Error in update transaction data");
        // header("location:income.php");
        echo "<script>
            alert('Updated Successfully');
            window.history.back();
        </script>";
    }
    if (isset($_POST['DELETE'])) {
        $id = $_POST['tranID'];
        $Accno = $_SESSION['Accno'];

        // delete the income data
        $sql = "delete from income where tran_id = $id and account = $Accno";
        $q = mysqli_query($con,$sql)
        or 
        die("Error in delete income data");

        // delete the transaction data
        $sql = "delete from transactions where tran_id = $id and account = $Accno";
        $q = mysqli_query($con,$sql)
        or
        die("Error in delete transaction data");
        //header("location:income.php");
        echo "<script>
            alert('Deleted Successfully');
            window.history.back();
        </script>";
    }
?>