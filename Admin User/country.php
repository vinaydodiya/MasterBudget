<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country</title>
</head>
<body>
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
            margin: 20px;
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
        }        #add{
            background-color: rgb(46, 255, 53);
            color: white;
            padding: 3px 15px;
        }
        .Transaction{
            display: flex;
            justify-content: space-evenly;
            
        }
        
        .trantable{
            height: 400px;
            overflow-y: scroll;
            border: 2px solid  #023047;
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
        #tdadd{
            display: flex;
        }
        input{
            background: none;
            padding: 4px;
            border: none;
            
        }
        #transaction-table2{
            width: 50%;
            margin-top: 10px;
            
        }
        .newInput{
            background: none;
            padding: 4px;
            
        }
    </style>
   
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