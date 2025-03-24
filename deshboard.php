<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/ico" href="style/images/favicon.ico">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            overflow-y: scroll;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        body::-webkit-scrollbar {
            display: none;
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

        .heading_amount {
            display: flex;
            justify-content: space-between;
            flex: 0.6;
        }

        .heading_amount div {
            text-align: center;
        }

        .heading_amount h3 {
            font-size: 16px;
            font-weight: 500;
            color: #666;
            margin: 0;
        }

        .heading_amount p {
            font-size: 18px;
            font-weight: 700;
            color: #2c3e50;
            margin: 5px 0 0;
        }

        .content {
            width: 98%;
            margin: 20px auto;
        }

        .monthdetail {
            display: flex;
            justify-content: space-evenly;
            margin-top: 20px;
        }

        .monIncm, .monExpnc {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            border-radius: 20px;
            flex-direction: column;
            padding: 20px;
            width: 20%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .monIncm:hover, .monExpnc:hover {
            transform: translateY(-5px);
        }

        .monIncm h3, .monExpnc h3 {
            font-size: 18px;
            font-weight: 500;
            color: #666;
            margin: 0;
        }

        .monIncm p, .monExpnc p {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
            margin: 10px 0 0;
        }

        .graphs {
            display: flex;
            justify-content: space-around;
            margin-top: 5%;
        }

        canvas {
            width: 50px;
            height: 10px;
        }

        .graph1, .graph2 {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .graph1:hover, .graph2:hover {
            transform: translateY(-5px);
        }

        #myPlot, #myPlot2 {
            width: 100%;
            max-width: 500px;
            height: 300px;
        }

        .twograph {
            
            border-radius: 20px;
            padding: 20px;
            
            margin-bottom: 20px;
        }

        .twograph canvas {
            width: 100%;
            height: 300px;
        }

    </style>

<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://cdn.plot.ly/p63lotly-latest.min.js"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script><!--dual graph-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script><!--dual graph-->

</head>
<body>

    <div class="heading">
        <h1>DASHBOARD</h1>

        <?php 
        
        include "connect.php";
        
//  ---------Bank Add-----------
$s = "select * from bank_details";
$r = mysqli_query($con,$s);
$cntr = 0;  
         /*echo $_SESSION['MyEmail'];*/
         while($res = mysqli_fetch_array($r)){
             if($_SESSION['MyEmail'] == $res['email'])
             {
                 $cntr = 1;
             }
             
            }

         if($cntr == 1)
         {
             echo '<a href="addBank.html" style="display:none;"><button>Add Bank</button></a>';
            }
        else{
            echo '<a href="addBank.html" style=""><button style="background-color: blue; color:white;padding:15px 30px;">Add Bank</button></a>';
            
        }
        
//  ---------Bank Add-----------
        $Accno = $_SESSION['Accno'];
        $s1 = "select * from transactions where account = '$Accno'";
        $q = mysqli_query($con,$s1)
        or
        die("Error in transaction data selection");
        $inc =0;
        $expc = 0;
        $bal = 0;
        $data=0;
        //$cars = array("Volvo", "BMW", "Toyota");
        while($res = mysqli_fetch_array($q)){
        
            if ($res['type'] == 'Income'){
                $inc = $inc + $res['amount'];
                $bal = $bal + $res['amount'];
                $data += $res['amount'];
            }
            else if($res['type'] == 'Expense'){
                $data -= $res['amount'];
                $expc = $expc + $res['amount'];
                $bal = $bal - $res['amount'];
            }
        }
        
        $d = date("m");
        // ----- array values Income   -------------
            $ixvalue = [];
            $iyvalue = [];
            $Accno = $_SESSION['Accno'];
            $i = "select cetegory,sum(amount) as cval from transactions where account = $Accno and type = 'Income' and MONTH(tran_date) = '$d' group by cetegory";
            $iq = mysqli_query($con,$i)
            or 
            die("Error in select income data");
            while($res = mysqli_fetch_array($iq))
            {
                array_push($ixvalue, $res['cetegory']);
                array_push($iyvalue, $res['cval']);
            }
        //  ----- end array value Income  ----------
        
        // ----- array values Expense  -------------
        $exvalue = [];
        $eyvalue = [];
        $Accno = $_SESSION['Accno'];
        $i = "select cetegory,sum(amount) as cval from transactions where account = $Accno and type = 'Expense' and MONTH(tran_date) = '$d' group by cetegory";
        $iq = mysqli_query($con,$i)
        or 
        die("Error in select income data");
        while($res = mysqli_fetch_array($iq))
        {
            array_push($exvalue, $res['cetegory']);
            array_push($eyvalue, $res['cval']);
        }
        //  ----- end array value Expense  --------
                
        
        $_SESSION['Balance'] = $bal; /*Session declare Balance */
        $_SESSION['Income'] = $inc; /*Session declare Income */
        $_SESSION['Expense'] = $expc; /*Session declare Expense */
        /*echo $_SESSION['Accno'] . "   ";*/
        echo "<div class='heading_amount'><div class='Accno'><h3>Account</h3><p>".$_SESSION['Accno'] . " </h3> </div> ";
        echo "<div class='Balance'><h3>Balance</h3><p> ".$_SESSION['country_symbol']." ".$_SESSION['Balance'] . "/-</p></div> </div> ";

/*  ------------  Begin Array value for Graph  --------------*/

    $ivalue = [];
    $evalue = [];
    $mvalue = [];
    $Accno = $_SESSION['Accno'];
// --------- Expense Value in array -----------------
$e = "select DISTINCT MONTHNAME(tran_date) as months,sum(amount) as expense from transactions where account = $Accno and type = 'Expense' group by MONTH(tran_date) order by tran_date;";
$eq = mysqli_query($con,$e)
    or 
    die("Error in select income data");
    while($res = mysqli_fetch_array($eq))
    {
        //array_push($ivalue, $res['']);
        array_push($evalue, $res['expense']);
        array_push($mvalue, $res['months']);
    }

    
    // --------- Income Value in array -----------------
    $i = "select DISTINCT MONTHNAME(tran_date) as months,sum(amount) as income from transactions where account = $Accno and type = 'Income' group by MONTH(tran_date) order by tran_date;";
    $iq = mysqli_query($con,$i)
    or
    die("Error in select income data");
    while($res = mysqli_fetch_array($iq))
    {
        array_push($ivalue, $res['income']);
        //array_push($evalue, $res['']);
        //array_push($mvalue, $res['months']);
    }
 /* ------------  End Array value for Graph  --------------
*/

        ?>
</div>
<div class="content">


<div class="twograph">


<canvas id="myChartb" width="800px" height="200px" ></canvas>
    <script>
    // values for the graph  
    const mvalue = JSON.parse('<?= json_encode($mvalue); ?>');
    const ivalue = JSON.parse('<?= json_encode($ivalue); ?>');
    const evalue = JSON.parse('<?= json_encode($evalue); ?>');

// Create the chart
const ctx = document.getElementById('myChartb').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: mvalue,  // x-values for the months
        datasets: [{
            label: 'Incomes',
            data: ivalue,  // y-values for incomes
            backgroundColor: 'green',
            borderColor: 'darkgreen',
            borderWidth: 5,
            

        }, {
            label: 'Expenses',
            data: evalue,  // y-values for expenses
            backgroundColor: 'red',
            borderColor: 'darkred',
            borderWidth: 5
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

    </script>
    <div class="graphs">
<!--PI chart -->
            <div class="graph1">
                <div id="myPlot" style="width:100%;max-width:500px"></div>

                <script>
                    function pichart(){

                const xArray = JSON.parse('<?= json_encode($ixvalue); ?>');
                const yArray = JSON.parse('<?= json_encode($iyvalue); ?>');

                const layout = {title:"INCOME"};

                const data = [{labels:xArray, values:yArray, type:"pie"}];

                Plotly.newPlot("myPlot", data, layout);
                    }
                    
                    pichart()
                    
                </script>

            </div>
            <!--  over PI chart -->     

        <!--PI chart -->
        <div class="graph2">
            <div id="myPlot2" style="width:100%;max-width:500px"></div>

                <script>
                    function pichart(){

                    const xArray = JSON.parse('<?= json_encode($exvalue); ?>');
                    const yArray = JSON.parse('<?= json_encode($eyvalue); ?>');
                const layout = {title:"EXPENSE"};

                const data = [{labels:xArray, values:yArray, hole: .0, type:"pie"}];
                
                Plotly.newPlot("myPlot2", data, layout);
                    }
                    
                    pichart()
                    
                </script>

            </div>
            <!--  over PI chart -->     
        </div>
        </div>

    <div class="monthdetail">
            
        <div class="monIncm">
            <?php 
            include "connect.php";
            echo "<h3>Income ".date('F')."</h3>";
            echo "<p>".$_SESSION['country_symbol']." ";
            $d = date("m ");
            $tim = 0;
            $im = "select amount from income where account = $Accno and MONTH(trandate) = $d";
            $rm = mysqli_query($con,$im)
            or 
            die("Error in current month");
            while($rsm = mysqli_fetch_array($rm))
            {
                $tim += $rsm['amount'];
            }
            echo $tim ."</p>";
            
            ?>
        </div>

        <div class="monExpnc">
            <?php 
            include "connect.php";
            echo "<h3>Expense ".date('F')."</h3>";
            echo "<p>".$_SESSION['country_symbol'] ." ";
            $d = date("m ");
            $t = 0;
            $tr = "select * from expense where account = $Accno and MONTH(trandate) = $d";
            $rmt = mysqli_query($con,$tr);
            while($rsm = mysqli_fetch_array($rmt)){
        
                $t = ($t + $rsm['amount'])." ";
            }
            echo $t ."</p>";
            ?>
        </div>
    </div>           

</body>
</html>