
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment</title>
    <link rel="shortcut icon" type="image/ico" href="style/images/favicon.ico">
    <link rel="stylesheet" href="../style/adminInvestments.css">
    <style>
       
    </style>
</head>
<body>
    <div class="heading">
        <h1>Investment</h1>
    </div>

    <div class="body-content">
        <div class="main-part">
            <div class="menu">
                <button id="add">Add Investment</button>
                <button id="view">View Investment</button>
            </div>
            <div class="hidden" id="add-investment">
                <table width="50%">
                <form action="AddInvestments.php" method="post">
                    <tr>
                        <td><label for="name">Name:</label></td>
                        <td><input type="text" name="name" id="name" required cols="50"></td>
                    </tr>
                    <tr>
                        <td><label for="description">Description:</label></td>
                        <td><textarea name="description" id="description" required cols="50" rows="5"></textarea></td></tr>
                    <tr><td colspan="2" align="center"><button type="submit" name="addbtn" id="addbtn">Add</button></t></tr>
                </form>
                </table>
            </div>
            <div class="hidden" id="view-investment">
                <table cellspacing="20px">
                    
                        <?php 
                            include 'connect.php';
                            // --- display data from database ---
                            $sql = "select * from Investments";
                            $result = mysqli_query($con, $sql);
                            $cnt = $result->num_rows;
                            addData($con,($cnt+1));

                            $sno = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $sno++;
                                echo "<tr class='ideas'><td><h3 id=hno>".$sno."</h3></td>";
                                echo "<td><h3>".$row['Item']."</h3>";
                                echo "".$row['Text']."</td></tr>";
                                $cnt++;
                            }
                            
                            // --- end ---

                            // --- add data to database ---
                            function addData($con , $cnt){
                                if(isset($_POST['addbtn'])){
                                    $name = $_POST['name'];
                                    $description = $_POST['description'];

                                    $sqladd = "insert into Investments values($cnt,'$name', '$description');";
                                    
                                    if(mysqli_query($con, $sqladd)){
                                        echo "<script>alert('Data added successfully');</script>";
                                    }else{
                                        echo "<script>alert('Data not added');</script>";
                                    }
                                }
                            }
                            // --- end ---
                        ?>
                    
                </table>
            </div>
        </div>
    </div>
    <script>
        const add = document.getElementById('add');
        const view = document.getElementById('view');
        const addInvestment = document.getElementById('add-investment');
        const viewInvestment = document.getElementById('view-investment');

        add.addEventListener('click', () => {
            addInvestment.classList.remove('hidden');
            viewInvestment.classList.add('hidden');
        });

        view.addEventListener('click', () => {
            viewInvestment.classList.remove('hidden');
            addInvestment.classList.add('hidden');
        });
    </script>
</body>
</html>

