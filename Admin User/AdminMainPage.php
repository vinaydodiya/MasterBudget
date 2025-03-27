<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Budget Admin</title>
    <link rel="shortcut icon" type="image/ico" href="../style/images/logo.png" >
    <link rel="stylesheet" href="../style/adminMainPage.css">

</head>
<body>
    <div class="main_div">
        <div class="menubar">

            <div class="main">
                <div class="heading">
                    <img src="../style/images/logo.png" alt="Master Budget" >
                </div>
                <ul>                    
                    <a href="AdminDashboard.php" target="tframe"><li>Dashboard</li></a>
                    <a href="ManageUser.php" target="tframe"><li>Manage User</li></a>
                    <a href="AllTransactions.php" target="tframe"><li>Transactions</li></a>
                    <a href="country.php" target="tframe"><li>Country</li></a>
                    <a href="AddInvestments.php" target="tframe"><li>Investment Advise</li></a>
                    <a href="adminTaxes.php" target="tframe"><li>Tax of Users</li></a>
                </ul>
            </div>
        </div>
        <div class="contener_div">
            <div class="header">
                    <div class="header_Title" >
                        <h1>MASTER BUDGET</h1>
                    </div>
                    <div class="logout">
                        <h5 onclick="lout()"><abbr title="Log Out"><img src="../style/images/logout.svg" alt="Log Out" width="30px"></abbr></h5>
                    </div>
            </div>
            <div class="contents">
                <iframe src="AdminDashboard.php" frameborder="0" name="tframe" height="98%" width="100%"></iframe>
            </div>
        </div>
    </div>
    <script>
        function lout() {
            if (confirm("Do you want to Log Out?")) {
                window.close();
                window.open('../index.php', '_self');
                window.history.clear();
            }
        }
    </script>
</body>
</html>