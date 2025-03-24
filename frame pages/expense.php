<?php 
    include "connect.php";
    
// --------  pi-chart 1 value --------
    $ixvalue = [];
    $iyvalue = [];
    $Accno = $_SESSION['Accno'];
    $i = "select category,sum(amount) as cval from expense where account = $Accno group by category";
    $iq = mysqli_query($con,$i)
    or 
    die("Error in select expense data");
    while($res = mysqli_fetch_array($iq))
    {
        array_push($ixvalue, $res['category']);
        array_push($iyvalue, $res['cval']);
    }
// -------- End pi-chart-2 --------------

// --------  pi-chart 2 value --------
    $ixvalue2 = [];
    $iyvalue2 = [];
    $Accno = $_SESSION['Accno'];
    $i2 = "select method,sum(amount) as cval from expense where account = $Accno group by method";
    $iq2 = mysqli_query($con,$i2)
    or 
    die("Error in select expense data");
    while($res2 = mysqli_fetch_array($iq2))
    {
        array_push($ixvalue2, $res2['method']);
        array_push($iyvalue2, $res2['cval']);
    }
// -------- End pi-chart-2 --------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
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
            height: 50px;
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
        .piechart{
            display: flex;
            justify-content: space-around;
            margin: 5%;
        }
        button{
            background-color: rgb(0, 136, 0);
            color: white;
            padding: 3px 15px;
        }
        .trantable{
            height: 300px;
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
    <h1>EXPENSE</h1>
    <a href="NewTranHTML.php"><button><h4>New Transaction</h4></button></a>
</div>
<div class="piechart">
    <!--PI chart -->
    <div class="graph">
            <div id="myPlot1" style="width:80%;max-width:500px;background-color:aquamarine;"></div>

        <script>
            function pichart(){

            let inc = 2000;
            let exp = 720;
            let bal = inc - exp;
        const xArray = JSON.parse('<?= json_encode($ixvalue); ?>');
        const yArray = JSON.parse('<?= json_encode($iyvalue); ?>');
        
console.log(xArray[0]);
console.log(yArray[0]);
        const layout = {title:"Category"};

        const data = [{labels:xArray, values:yArray, hole: .5, type:"pie"}];

        Plotly.newPlot("myPlot1", data, layout);
            }
            
            pichart()
            
        </script>

            </div>
            <!--  over PI chart -->     


             <!--PI chart -->
    <div class="graph">
            <div id="myPlot2" style="width:80%;max-width:500px;background-color:aquamarine;"></div>

        <script>
            function pichart(){

            let inc = 2000;
            let exp = 720;
            let bal = inc - exp;
        const xArray2 = JSON.parse('<?= json_encode($ixvalue2); ?>');
        const yArray2 = JSON.parse('<?= json_encode($iyvalue2); ?>');
        
console.log(xArray2[0]);
console.log(yArray2[0]);
        const layout = {title:"Method"};

        const data = [{labels:xArray2, values:yArray2, hole: .5, type:"pie"}];

        Plotly.newPlot("myPlot2", data, layout);
            }
            
            pichart()
            
        </script>

            </div>
            <!--  over PI chart -->     
    </div>

            <?php 
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
        
            $s = "select * from transactions where account = '$Accno' and type='expense' order by date desc";
            $q = mysqli_query($con,$s)
            or
            die("Error in transaction data selection");
            
            
            echo '
            
</div>
<div class="Transaction">
<div class="trantable">
<table border=2px cellspacing=0 cellpadding=15px align=center id="transaction-table">
<thead>
<tr>
<th>Account</th>
<th>Transaction ID</th>
<th>Transaction Name</th>
<th>Category</th>
<th>Type</th>
<th>Method</th>
<th>Transaction Date</th>
<th>Amount</th>
<th>Date</th>
</tr>
</thead>
    <tbody>';

while($res = mysqli_fetch_array($q)){
            echo '<tr><td>'.$res['account'].'</td>';
            echo '<td>'.$res['tran_id'].'</td>';
            echo '<td>'.$res['tranname'].'</td>';
            echo '<td>'.$res['cetegory'].'</td>';
            echo '<td>'.$res['type'].'</td>';
            echo '<td>'.$res['method'].'</td>';
            echo '<td>'.$res['tran_date'].'</td>';
            echo '<td align=right>'.$res['amount'].'</td>';
            echo '<td>'.$res['date'].'</td></tr>';
            
        }
echo '
        
    </tbody></table>
    </div>';
            ?>

</body>
</html>