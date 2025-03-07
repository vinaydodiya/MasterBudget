
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment</title>
    <link rel="shortcut icon" type="image/ico" href="style/images/favicon.ico">

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
        .ideas{
            background-color: white;
            width: 80%;
            border-radius: 10px;
            padding: 2%;
            margin: auto;
            height: auto;
            margin-top: 2%;
            margin-bottom: 2%;
            box-shadow: 2px, 2px,  black;
            box-shadow: inset 1px 1px 2px rgb(81, 89, 190);
            text-align: justify;
            text-justify: inter-word;
        }
        button{
            text-decoration: none;
            border: 0;
            background: transparent;
            font-size: larger;
        }
        .menu{
            display: flex;
            justify-content: space-between;
        }
        td{
            padding: 20px;
            
        }
       
    </style>
</head>
<body>
    <div class="heading">
        <h1>INVESTMENT</h1>
    </div>
    <div class="body-content">
        <div class="main-part">
            
            
            <div class="hidden" id="view-investment">
                <table width="90%" align="center" cellspacing="20px">
                    
                        <?php 
                            include 'connect.php';
                            // --- display data from database ---
                            $sql = "select * from Investments";
                            $result = mysqli_query($con, $sql);
                            $cnt = $result->num_rows;
                            


                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr class='ideas'><td><h3 id=hno>".$row['ID']."</h3></td>";
                                echo "<td><h3>".$row['Item']."</h3>";
                                echo "".$row['Text']."</td></tr>";
                                $cnt++;
                            }
                            

                        ?>
                    
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>

