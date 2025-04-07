<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Tax Saver Calculator</title>
    <link rel="stylesheet" href="../style/stylestax.css">
</head>
<body>
    <div class="container">
        <h1>Global Tax Saver Calculator</h1>
        <p>select your country to get personalized tax-saving suggestions.</p>

        <div class="input-section">
            <label for="countrys">Select your Country:</label>
            <select id="country">
                <option value="USA">USA</option>
                <option value="UK">UK</option>
                <option value="India">India</option>
                <option value="Canada">Canada</option>
                <option value="Australia">Australia</option>
            </select>
        </div>

        <div class="input-section">
            <label for="income">Taxable Income (in USD or equivalent):</label>
            
            <?php
            include "connect.php";
            $Accno = $_SESSION['Accno'];

// {    date between current financial year
            $today = new DateTime();
            // Subtract 1 year
            $today->modify('-1 year');
            // Set the date to April 1st of that year
            $today->setDate($today->format('Y'), 4, 01);
            // Display the date in YYYY-MM-DD format
            $from = $today->format('Y-m-d');
            $to = date("Y") . "-03-31";
            
// }    date between current financial year

            $s1 = "select * from transactions where account = '$Accno' and tran_date BETWEEN '$from' AND '$to'";
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
            echo '<abbr title = "From '. $from.' To '. $to.'" ><input type="number" id="income" name="income" value=' . $bal . '></abbr>';

            $symbol = $_SESSION['country_symbol'];
            ?>
            <!-- <input type="number" id="income" placeholder="Enter your taxable income" required> -->
        </div>

        <button onclick="calculateTax()">Get Suggestions</button>

        <div id="results" class="results">
            <h2>Tax Saving Suggestions</h2>
            <div id="suggestions"></div>
            <div id="taxDetails"></div>
        </div>
    </div>

    <script src="taxscript.js"></script>
</body>
</html>
