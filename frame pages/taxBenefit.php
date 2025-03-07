<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Benefites</title>
    <style>
        body{
            background-color:aliceblue;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            align-items: center;
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
            z-index: 1;
        }
        input{
            width: 30%;
            padding: 5px;
        }
        .content{
            display:flex;
            padding: 20px;
        }
        .tax_data{
            background-color:ghostwhite;
            padding: 10px;
            margin: 5px;
        }
        .benefites{
            padding: 10px;
            margin: 5px;
            background-color:ghostwhite;
            flex: 80%;
        }
    </style>
    
</head>
<body onload="change()">
    <div class="heading">
        <h1>TAX SAVING CALCULATOR</h1>
    </div>
        <form method="post" name="myform">
    <div class="content">
        <div class="tax_data">
            <div class="data1">
                <h4>Your Current Annual Income</h4>
                <?php 
                    include "connect.php";
                    
                    $Accno = $_SESSION['Accno'];
        $s1 = "select * from transactions where account = '$Accno' and tran_date >= '2025-01-01' and tran_date <= '2025-12-31' ";
        $q = mysqli_query($con,$s1)
        or
        die("Error in transaction data selection");

        $bal = 0;
        //$cars = array("Volvo", "BMW", "Toyota");
        while($res = mysqli_fetch_array($q)){
        
            if ($res['type'] == 'Income'){
                $bal = $bal + $res['amount'];
            }
            else if($res['type'] == 'Expense'){
                $bal = $bal - $res['amount'];
            }
        }
                    $_SESSION['taxable_Income'] = $bal;
                    echo '<input type="number" name="annualIncm" id="annincm" onkeyup="change()" value='. $bal .'>';
                ?>
            </div>
            <div class="data2">
                <h4>Your Current Investment in 80C (Includes investments in PF/ Mutual Funds / FD / PPF / Insurance )</h4>
                <input type="number" name="annualInvest" id="taxInvest" onkeyup="change()">
            </div>
        </div>
        </form>
        <div class="benefites">
        <div class="data1">
                <h4>Your Taxable Income</h4>

                <h4 id="incm"></h4>
                
            </div>
            <div class="data2">
                <p>You could have saved ₹<p id="tax_saved"></p>. You lost ₹<p id="tax_lost"></p> by not investing in Section 80C. Invest in Tax Saving Funds. You also lost an option of making additional ₹<p id="tax_additional"></p> by not investing in Tax Saving Funds.</p>
            </div>
        </div>
    </div>
    <script>
        function change(){
            let tax = document.getElementById('annincm').value;
            let taxlost = document.getElementById('taxInvest').value;
            let saved = (tax * 0.7875);
            let lost = 45000 - (3 * saved / 100);
            document.getElementById('incm').innerHTML = tax;
            document.getElementById('tax_saved').innerHTML = saved;
            document.getElementById('tax_lost').innerHTML = lost;
            document.getElementById('tax_additional').innerHTML = (saved - lost);
        }
    </script>
</body>
</html>