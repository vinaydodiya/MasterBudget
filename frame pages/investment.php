
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment</title>
    <link rel="shortcut icon" type="image/ico" href="style/images/favicon.ico">
    <link rel="stylesheet" href="../style/investment.css">
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
                                echo "<p>".$row['Text']."</p></td></tr>";
                                $cnt++;
                            }
                            

                        ?>
                    
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>

