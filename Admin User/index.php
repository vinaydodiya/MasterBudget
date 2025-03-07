<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Budget Admin</title>
    <link rel="shortcut icon" type="image/ico" href="../style/images/favicon.ico">
    <style>
        body{
            height: 100vh;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin: 0;
            padding: 0;
        }
      
        .main_div{
            display: flex;
            height: 100%;
        }

        .menubar{
            margin: 0;
            padding: 0px;
            overflow: hidden;
            background-color: #023047;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            flex: 2;
            height: 100%;
        }
        .contener_div{
            flex: 10;
            display: flex;
            flex-direction: column;
        }
        .header{
            flex: 1;
            background-color: #023047;
            color:white;
        }
        .contents{
            flex: 10;
            height: 98%;
        }
        .heading{
            margin: 20px;
        }
        a{
            text-decoration: none;
            color: white;

        }
        ul{
            padding: 5%;
        }
        li{
            list-style: none;
            padding: 20px;
            border-radius: 10px 0px 0px 10px;
            text-align: left;
        }
        li:hover{
            background-color: #219ebc;
        }
        h1{
            
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>
<body>
    <div class="main_div">
        <div class="menubar">

            <div class="main">
                <div class="heading">
                    <img src="../style/images/logo.png" alt="Master Budget" height="100px" width="150px">
                </div>
                <ul>                    
                    <a href="AdminDashboard.php" target="tframe"><li>Dashboard</li></a>
                    <a href="ManageUser.php" target="tframe"><li>Manage User</li></a>
                    <a href="AllTransactions.php" target="tframe"><li>Transactions</li></a>
                    <a href="country.php" target="tframe"><li>Country</li></a>
                    <a href="AddInvestments.php" target="tframe"><li>Investment Advise</li></a>
                    <a href="taxes.php" target="tframe"><li>Tax of Users</li></a>
                </ul>
            </div>
        </div>
        <div class="contener_div">
            <div class="header">
                <div class="heading" align="center">
                    <!--<img src="style/images/Master Budget Logo.png" alt="Master Budget" height="100px" width="50%">-->
                    <h1>MASTER BUDGET</h1>
                </div>
            </div>
            <div class="contents">
                <iframe src="AdminDashboard.php" frameborder="0" name="tframe" height="98%" width="100%"></iframe>
            </div>
        </div>
    </div>
</body>
</html>