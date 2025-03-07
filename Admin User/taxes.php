<?php
    include "connect.php";

    /* transaction */
    
    if(isset($_SESSION))
    {
        /*echo"Session is Started";*/
    }
    else{
        session_start();
    }
    
    
/*
    $s = "select b.accountNo, a.Name, b.email, (select sum(amount) from transactions t,bank_details b where type='Income'and t.account=b.accountNo) as income,(select sum(amount) from transactions t,bank_details b where type='Expense'and t.account=b.accountNo) as expense, a.country from accounts a,bank_details b, transactions t WHERE t.account = b.accountNo and a.Email = b.email GROUP by b.accountNo";
*/
    $s = "SELECT t.account as account,a.Name as name, sum(t.amount / c.crvalue) as tax FROM `transactions` t ,currency c, bank_details b, accounts a where t.account = b.accountNo and b.email = a.Email and a.country = c.country_name group by t.account";
    $q = mysqli_query($con,$s)
    or
    die("Error in transaction data selection");

    echo '
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaction</title>
    <style>
        body{
            background-color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 14px;
            position: relative;
            overflow: hidden;
        
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
        button{
            background-color: rgb(0, 136, 0);
            color: white;
            padding: 3px 15px;
        }
        .Transaction{
            display: flex;
            justify-content: space-evenly;
            
        }
        .data{
            background-color: whitesmoke;
            border: 2px solid rgb(92, 122, 128);
            border-radius: 15px;
            padding:20px;
            width:160px;
           
        }
        .trantable{
            height: 400px;
            overflow-y: scroll;

        }
        .trantable::-webkit-scrollbar {
            display: none;
        }
        table{
            background-color: whitesmoke;
        
        }
        th{
            background-color: #023047;
            color: white;
        }
    </style>
   
</head>
<body>
    <div class="heading">
    <h1>Tax of Users</h1>
    
    </div>
   
</div>
    <div class="Transaction">
    <div class="trantable">
    <table border=2px cellspacing=0 cellpadding=15px align=center id="transaction-table">
    <thead>
    <tr>
        <th>Account</th>
        <th>Name</th>
        <th>Total Taxable Income (USD)</th>
    </tr>
    </thead>
        <tbody>';
    $inc =0;
    $expc = 0;
    $bal = 0;
    while($res = mysqli_fetch_array($q)){
                echo '<tr><td>'.$res['account'].'</td>';
                echo '<td>'.$res['name'].'</td>';
                // echo '<td>'.$res['email'].'</td>';
                // echo '<td>'.$res['Password'].'</td>';
                // //echo '<td>'.$res['expense'].'</td>';
                echo '<td align="right">'.round($res['tax'],2).'</td></tr>';
            }
    echo '
            
        </tbody></table>
        </div>
        <div class="counters">
        
        
        </div>
    </div>   

 
</body>
</html>';

?>