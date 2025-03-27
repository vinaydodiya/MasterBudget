<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style/adminDashboard.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>

<body>
    <div class="main-body">
        <!-- Heading  -->
        <div class="heading">
            <h2>Dashboard</h2>
        </div>
        <!-- End Heading -->
        <!-- Heading Value -->
        <div class="heading-value">
            <div class="heading-value">
                <?php
                include "connect.php";
                $sql = "SELECT t.account as account, sum(t.amount / c.crvalue) as tax, count(tran_id) as totalTran FROM `transactions` t ,currency c, bank_details b, accounts a where t.account = b.accountNo and b.email = a.Email and a.country = c.country_name group by t.account";
                $query = mysqli_query($con, $sql)
                    or  die("Error in transaction data selection");
                $cnt = 0;
                $totAmount = 0;
                $totTrans = 0;
                while ($row = mysqli_fetch_array($query)) {
                    $cnt++;
                    $totAmount += $row['tax'];
                    $totTrans += $row['totalTran'];
                }

                echo '
<!-- Main content Part -->
        <div class="content-part">
        <!-- Total Values  -->
            <div class="totalValues">
                <div class="totalData"><h4>Total User</h4><h5 id="cntUsers" >' . $cnt . '</h5></div>
                <div class="totalData"><h4>Total Amount</h4><h5 id="cntamount" ><span id="usd"> USD </span>' . round($totAmount, 2) . '</h5></div>
                <div class="totalData"><h4>Total Transactions</h4><h5 id="cnttrans" >' . $totTrans . '</h5></div>
            </div>
        <!-- End Total values -->
        ';

                //   Data of Graph 

                $ivalue = [];
                $evalue = [];
                $mvalue = [];

                // --------- Expense Value in array -----------------
                $e = "SELECT MONTHNAME(t.tran_date) as months, sum(t.amount / c.crvalue) as tax FROM `transactions` t ,currency c, bank_details b, accounts a where t.type = 'Expense' and t.account = b.accountNo and b.email = a.Email and a.country = c.country_name group by MONTH(t.tran_date) order by t.tran_date";
                
                $eq = mysqli_query($con, $e)
                    or
                    die("Error in select income data");
                while ($res = mysqli_fetch_array($eq)) {
                    //array_push($ivalue, $res['']);
                    array_push($evalue, $res['tax']);
                    array_push($mvalue, $res['months']);
                }


                // --------- Income Value in array -----------------
                $i = "SELECT MONTH(t.tran_date), sum(t.amount / c.crvalue) as tax FROM `transactions` t ,currency c, bank_details b, accounts a where t.type = 'Income' and t.account = b.accountNo and b.email = a.Email and a.country = c.country_name group by MONTH(t.tran_date) order by t.tran_date";
                $iq = mysqli_query($con, $i)
                    or
                    die("Error in select income data");
                while ($res = mysqli_fetch_array($iq)) {
                    array_push($ivalue, $res['tax']);
                }

                ?>
            </div>
            <!-- End Heading value Part -->
            <!-- Graph Part -->
            <div class="graph-part">

                <h3 align="center">Monthly Income and Expense</h3>
                <div class="linegraph">

                    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                    <div class="total-values">
                        <!-- <div class="totalData"><h4>Total Income</h4><h5 id="cntUsers" >45000</h5></div> -->
                        <div class="totalData">
                            <?php
                            include "connect.php";
                            echo "<h3>Income " . date('F') . "</h3>";
                            echo "<p> USD ";
                            $d = date("m ");
                            $tim = 0;
                            $im = "SELECT sum(t.amount / c.crvalue) as tax FROM `transactions` t ,currency c, bank_details b, accounts a where t.type = 'Income' and t.account = b.accountNo and b.email = a.Email and a.country = c.country_name group by MONTH(t.tran_date) order by t.tran_date";
                            $rm = mysqli_query($con, $im)
                                or
                                die("Error in current month");
                            while ($rsm = mysqli_fetch_array($rm)) {
                                $tim = round($rsm['tax'],2);
                            }
                            echo $tim . "</p>";

                            ?>
                        </div>


                        <!-- <div class="totalData"><h4>Total Expense</h4><h5 id="cntamount" >26318</h5></div> -->
                        <div class="totalData">
                            <?php
                            include "connect.php";
                            echo "<h3>Expense " . date('F') . "</h3>";
                            echo "<p> USD ";
                            $d = date("m ");
                            $t = 0;
                            $tr = "SELECT sum(t.amount / c.crvalue) as tax FROM `transactions` t ,currency c, bank_details b, accounts a where t.type = 'Expense' and t.account = b.accountNo and b.email = a.Email and a.country = c.country_name group by MONTH(t.tran_date) order by t.tran_date";
                            $rmt = mysqli_query($con, $tr);

                            while ($rsm = mysqli_fetch_array($rmt)) {
                                $t = (round ($rsm['tax'], 2));
                            }
                            echo $t . "</p>";
                            ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- End Main content Part -->

        <script>
            // values for the graph  
            const mvalue = JSON.parse('<?= json_encode($mvalue); ?>');
            const ivalue = JSON.parse('<?= json_encode($ivalue); ?>');
            const evalue = JSON.parse('<?= json_encode($evalue); ?>');

            const xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

            new Chart("myChart", {
                type: "line",
                data: {
                    labels: mvalue,
                    datasets: [{
                        label: 'Expense',
                        data: evalue,
                        borderColor: "red",
                        fill: false
                    }, {
                        label: 'Income',
                        data: ivalue,
                        borderColor: "green",
                        fill: false
                    }]
                },
                options: {
                    legend: {
                        display: true
                    }
                }
            });
        </script>
</body>

</html>