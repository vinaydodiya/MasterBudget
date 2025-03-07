<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            
        }
        .heading{
            display: flex;
            justify-content: space-between;
            background-color:lightblue;
            border-radius: 10px;
            padding: 5px 50px;
            margin: 20px;
            position: sticky;
            top: 0px;
        }
        .totalValues{
            display: flex;
            justify-content: space-around;
        }
        .totalData{
            background-color: #023047;
            color: white;
            padding: 0px 20px;
            border-radius: 15px;
            width:15%;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="main-body">
<!-- Heading  -->
        <div class="heading">
            <h2>Dashboard</h2>
        </div>
<!-- End Heading -->
<?php 
    include "connect.php";
    $sql = "SELECT t.account as account, sum(t.amount / c.crvalue) as tax, count(tran_id) as totalTran FROM `transactions` t ,currency c, bank_details b, accounts a where t.account = b.accountNo and b.email = a.Email and a.country = c.country_name group by t.account";
    $query = mysqli_query($con,$sql)
    or  die("Error in transaction data selection");
    $cnt = 0;
    $totAmount = 0;
    $totTrans = 0;
    while($row = mysqli_fetch_array($query)){
        $cnt++;
        $totAmount += $row['tax'];
        $totTrans += $row['totalTran'];
    }

echo '
<!-- Main content Part -->
        <div class="content-part">
        <!-- Total Values  -->
            <div class="totalValues">
                <div class="totalData"><h4>Total User</h4><h5 id="cntUsers" >'.$cnt.'</h5></div>
                <div class="totalData"><h4>Total Amount</h4><h5 id="cntamount" ><span id="usd"> USD </span>'.round($totAmount,2).'</h5></div>
                <div class="totalData"><h4>Total Transactions</h4><h5 id="cnttrans" >'.$totTrans.'</h5></div>
            </div>
        <!-- End Total values -->
        ';
?>
        </div>
    </div>
</body>
</html>