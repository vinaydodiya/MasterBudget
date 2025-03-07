<?php
    include "connect.php";

    /* transaction */
    
    if(isset($_SESSION))
    {
        /*echo"Session is Started";*/
    }
    Else{
        session_start();
    }
    $Accno = $_SESSION['Accno'];
    /*echo $_SESSION['Accno'];
    echo $_SESSION['MyEmail'];*/

    $s = "select * from transactions where account = '$Accno' order by date desc";
    $q = mysqli_query($con,$s)
    or
    die("Error in transaction data selection");

    echo '
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaction</title>
    <link rel="shortcut icon" type="image/ico" href="style/images/favicon.ico">
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
            width: 95%;
            word-break: keep-all;
            
        }
        th{
            background-color: #023047;
            color: white;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js">
    </script>
    
</head>
<body>
    <div class="heading">
    <h1>Transaction</h1>
    <a href="newtransactions.php"><button><h4>New Transaction</h4></button></a>
    </div>
   
</div>
    <div class="Transaction">
    <div class="trantable">
    <table border=2px cellspacing=0 cellpadding=15px align=center id="transaction-table">
    <thead>
    <tr>
    <th>Account</th>
    <th>Transaction ID</th>
    <th>Transaction Name</th>
    <th>Transaction Date</th>
    <th>Amount</th>
    <th>Type</th>
    <th>Category</th>
    <th>Memo</th>
    <th>Date</th>
    </tr>
    </thead>
        <tbody>';
    $inc =0;
    $expc = 0;
    $bal = 0;
    while($res = mysqli_fetch_array($q)){
                echo '<tr><td>'.$res['account'].'</td>';
                echo '<td>'.$res['tran_id'].'</td>';
                echo '<td>'.$res['tranname'].'</td>';
                echo '<td>'.$res['tran_date'].'</td>';
                echo '<td align=right>'.$res['amount'].'</td>';
                echo '<td>'.$res['type'].'</td>';
                echo '<td>'.$res['method'].'</td>';
                echo '<td>'.$res['memo'].'</td>';
                echo '<td>'.$res['date'].'</td></tr>';
                if ($res['type'] == 'Income'){
                    $inc = $inc + $res['amount'];
                    $bal = $bal + $res['amount'];
                    
                }
                else if($res['type'] == 'Expense'){
                    $expc = $expc + $res['amount'];
                    $bal = $bal - $res['amount'];
                    
                }
            }
    echo '
            
        </tbody></table>
        </div>
        <div class="counters">
        <div class="counter">
        <div class="data">
                <h3>Total Income</h3>
                <h4 align=center>'.$_SESSION['country_symbol'].' '.$inc.'</h4>
            </div>
            <div class="data">
                <h3>Total Expenses</h3>
                <h4 align=center>'.$_SESSION['country_symbol'].' '.$expc.'</h4>
            </div>
            <div class="data">
                <h3>Total Balance</h3>
                <h4 align=center>'.$_SESSION['country_symbol'].' '.$bal.'</h4>
            </div>
            
        </div>
        </div>
    </div>   

 
</body>
</html>';

?>