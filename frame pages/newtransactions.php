
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Transaction</title>
    <style>
        body{
            
            justify-content: center;
            align-items: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        table{
            background-color:floralwhite;
            word-break:keep-all;
        }
        input,select{
            padding: 5px 20px;
            
        }
        select{
            width: 200px;
        }
        #submitbtn{
            background-color: green;
            color: white;
        }
        #resetbtn{
            color: white;
            background-color: red;
        }
        a{
            text-decoration: none;
        }
    </style>
    
</head>
<body>
    <form action="newtransaction.php" method="post" name="newtran">
        <table border="0" cellpadding="15px" cellspacing="0px" width="50%" align="center">
            <tr>
                <th colspan="2"><h1>Transaction Details</h1></th>
            </tr>
            <!--
            <tr>
                <td>Transaction ID</td>
                <td><input type="text" name="tid" value=  readonly ></td>
            </tr>-->
            <tr>
                <td>Transaction Name</td>
                <td><input type="text" name="tranname" required></td>
            </tr>
            <tr>
                <td>Cetegory</td>
                <td>
                    <?php 
                        session_start();
                        include "connect.php";
                        $acc = $_SESSION['Accno'];
                        $sc = "select * from cetegory where accountNo = $acc";
                        $qs = mysqli_query($con, $sc)
                        or 
                        die("Error in cetegory selection");
                        echo "<select name='tcet' id='tcet'>"; 
                        while($r = mysqli_fetch_array($qs))
                        {
                            echo "<option>".$r['cetegory_name']."</option>";
                        }
                        echo "</select>"; 
                    
                    ?>
                    <a href="AddCategory.php">➕</a>
                </td>
            </tr>
            <tr>
                <td>Date</td>
                <td><input type="date" name="tdate" placeholder="DD-MM-YYYY" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="radio" name="ttype" value="Expense">Expense
                    <input type="radio" name="ttype" value="Income">Income
                    <!--<input type="radio" name="ttype" value="Transfer To">Transfer To
                    <input type="radio" name="ttype" value="Transfer From">Transfer From--> 
                </td>
            </tr>
            <tr>
                <td>Method</td>
                <td><select name="tmethod" id="">
                    <option value="Cash">Cash</option>
                    <option value="Bank">Bank</option>
                    <option value="UPI">UPI</option>
                    <option value="Check">Check</option>
                    <option value="Other">Other</option>
                </select></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td><input type="number" name="tamount" required></td>
            </tr>
            <tr>
                <td>Memo</td>
                <td><textarea name="txtarea" rows="5" required></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Save" id="submitbtn">
                    <input type="reset" id="resetbtn">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>