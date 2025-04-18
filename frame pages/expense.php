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
    <link rel="stylesheet" href="../style/tranIncExp.css">
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
    <table>
        <form action="updateExpenses.php" method="post">
            <tr>
                <td><input type="number" placeholder="Transaction ID" name="tranID" required></td>
                <td><input required type="text" placeholder="Transaction Name" name="tranName"></td>
                <td><input required type="text" placeholder="Category" name="category"></td>
                <td><input required type="text" placeholder="Method" name="method"></td>
                <td><input required type="date" placeholder="Transaction Date" name="trandate"></td>
                <td><input required type="number" placeholder="Amount" name="amount"></td>
                <td><input type="submit" value="UPDATE" name="UPDATE" id="update"><input type="submit" value="DELETE" name="DELETE" id="delete"></td>
            </tr>
        </form>
    </table>
    </div>';
            ?>

</body>
</html>