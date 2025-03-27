<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country</title>
</head>
<body>
    <link rel="stylesheet" href="../style/country.css">
</head>
<body>
    <div class="heading">
    <h1>Country</h1>
    
    </div>
   
</div>
    <div class="Transaction">
    <div class="trantable">
    <table border=2px cellspacing=0 cellpadding=15px align=center id="transaction-table">
        <thead>
            <tr>
                <th>Country ID</th>
                <th>Country Name</th>
                <th>Currency</th>
                <th>Symbol</th>
                <th>Value</th>
            </tr>
        </thead>

        <tbody>
            <?php
                include "connect.php";

                $s = "select * from currency order by country_id";
                $q = mysqli_query($con,$s)
                or
                die("Error in transaction data selection");

                while($res = mysqli_fetch_array($q)){
                    echo '<tr><td><input type="number" value="'.$res['country_id'].'" readonly></td>';
                    echo '<td><input type="text" value="'.$res['country_name'].'" readonly></td>';
                    echo '<td><input type="text" value="'.$res['currency'].'" readonly></td>';
                    echo '<td><input type="text" value="'.$res['symbol'].'" readonly></td>';
                    echo '<td><input type="number" value="'.$res['crvalue'].'" readonly></td></tr>';
                }


                if(isset($_POST['addbtn']))
                {
                    (mysqli_query($con, "insert into currency values('".$_POST['addID']."','".$_POST['addname']."','".$_POST['addcurrency']."','".$_POST['addsymbol']."','".$_POST['addvalue']."')")) or die("Error in add data");
                    echo "<script>
                    alert('Country Added Successfull...');
                    window.history.go(-1);
                    </script>";
                }
                echo "<script>
                    document.getElementById('addcontry').reset();
                    </script>";
            ?>
                
        </tbody>
    </table>
        </div>
        
    </div>
<div class="addData">
    <table border=2px cellspacing=0 cellpadding=15px align=center id="transaction-table2">
        <form action="country.php" method="post" name="addcontry">
        <tr>
            <td><input  name="addID" placeholder="ID" class="newInput" required type="number"></td>
            <td><input  name="addname" placeholder="Country Name" class="newInput" required type="text"></td>
            <td><input  name="addcurrency" placeholder="Currency" class="newInput" required type="text"></td>
            <td><input  name="addsymbol" placeholder="Symbol" class="newInput" required type="text"></td>
            <td id="tdadd"><input  name="addvalue" placeholder="0.00" class="newInput" required type="number" step="any">
            <input name="addbtn" type="submit" value="➕" id="add"></td>
        </tr>
    </form>
    </table> 
    </div>
</body>
</html>