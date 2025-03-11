<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Calculator and Savings Suggestions</title>
    <link rel="stylesheet" href="styletax.css">
</head>

<body>
    <div class="container">
        <h1>Tax Calculator and Savings Suggestions</h1>
        <form id="taxForm">
            <label for="income">Enter Your Taxable Income <span class="symbol"></span>:</label>

            <?php
            include "connect.php";

            $Accno = $_SESSION['Accno'];
            $s1 = "select * from transactions where account = '$Accno' and YEAR(tran_date) = year(curdate()) ";
            $q = mysqli_query($con, $s1)
                or
                die("Error in transaction data selection");

            $bal = 0;
            //$cars = array("Volvo", "BMW", "Toyota");
            while ($res = mysqli_fetch_array($q)) {

                if ($res['type'] == 'Income') {
                    $bal = $bal + $res['amount'];
                } else if ($res['type'] == 'Expense') {
                    $bal = $bal - $res['amount'];
                }
            }
            $_SESSION['taxable_Income'] = $bal;
            //echo '<input type="number" name="annualIncm" id="annincm" onkeyup="change()" value='. $bal .'>';
            echo '<input type="number" id="income" name="income" value=' . $bal . '>';

            $symbol = $_SESSION['country_symbol'];
            ?>
            <button type="submit" onclick="load()">Calculate Tax Benefits</button>
        </form>

        <div id="result" class="hidden">
            <h2>Tax Benefits and Suggestions</h2>
            <p><strong>Taxable Income:</strong> <span class="symbol"></span><span id="taxableIncome"></span></p>
            <p><strong>Tax Payable:</strong> <span class="symbol"></span><span id="taxPayable"></span></p>
            <p><strong>Tax Saving Suggestions:</strong></p>
            <ul id="suggestions"></ul>
            <p><strong>NOTE : </strong>(This Tax System is use according to United State Tax Policy)</p>
        </div>
    </div>
    <script>
        function load() {
            var smb = JSON.parse('<?= json_encode($symbol); ?>');
            const symbolElements = document.querySelectorAll('.symbol');
            symbolElements.forEach(element => {
                element.textContent = "(" + smb + ") ";
            });
        }
    </script>
    <script src="scripttax.js"></script>
</body>

</html>