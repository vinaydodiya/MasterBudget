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
    $s = "select * from accounts a, bank_details b where a.Email = b.email";
    $q = mysqli_query($con,$s)
    or
    die("Error in transaction data selection");

    echo '
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaction</title>
    <style>
        body {
            background-color: #f4f7fa;
            font-family: verdana;
            font-size: 14px;
            position: relative;
            
            margin: 0;
            padding: 0;
            color: #333;
            position: relative;
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px 50px;
            margin: 20px;
            position: sticky;
            top: 0;
            z-index: 1;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .heading h1 {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
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
        table {
            background-color: #ffffff;
            width: 100%;
            word-break: keep-all;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #023047;
            color: white;
            font-weight: 500;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
   
</head>
<body>
    <div class="heading">
    <h1>Manage User</h1>
    
    </div>
   
</div>
    <div class="Transaction">
    <div class="trantable">
    <table border=2px cellspacing=0 cellpadding=15px align=center id="transaction-table">
    <thead>
    <tr>
    <th>Account</th>
   
    <th>Name</th>
    <th>Email ID</th>
    <th>Password</th>
    
    <th>Country</th>
    </tr>
    </thead>
        <tbody>';
    $inc =0;
    $expc = 0;
    $bal = 0;
    while($res = mysqli_fetch_array($q)){
                echo '<tr><td>'.$res['accountNo'].'</td>';
                echo '<td>'.$res['Name'].'</td>';
                echo '<td>'.$res['email'].'</td>';
                echo '<td>'.$res['Password'].'</td>';
                //echo '<td>'.$res['expense'].'</td>';
                echo '<td>'.$res['country'].'</td></tr>';
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