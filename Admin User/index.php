<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Budget Admin</title>
    <link rel="shortcut icon" type="image/ico" href="style/images/logo.png" >
    <style>
        /* General Styles */
        body {
            overflow: hidden;
            margin: 0;
            padding: 0;
            font-family: Verdana;
            background-color: #f0f4f8;
        }
        #logoimg{
            border-radius: 50%;
        }
        /* Main Container */
        .main_div {
            display: flex;
            height: 100vh;
        }

        /* Menubar Styles */
        .menubar {
            margin: 0;
            padding: 20px;
            overflow: hidden;
            background-color: #023047;
            font-family: verdana;
            flex: 2;
            height: 100%;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .menubar .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .menubar .heading img {
            height: 100px;
            width: 150px;
        }

        .menubar ul {
            padding: 0;
            margin: 0;
        }

        .menubar ul li {
            list-style: none;
            padding: 15px 20px;
            margin: 10px 0;
            border-radius: 8px;
            text-align: left;
            transition: all 0.3s ease;
            color: white;
            cursor: pointer;
        }

        .menubar ul li:hover {
            background-color: #f0f4f8;
            color: #023047;
            transform: translateX(5px);
        }

        a {
            text-decoration: none;
            color: white;
            display: block;
        }

        /* Content Container */
        .contener_div {
            flex: 10;
            display: flex;
            flex-direction: column;
        }

        /* Header Styles */
        .headersid {
            flex: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 3%;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header{
            
            display: flex;
            justify-content: space-between;
            align-items: center;

        }
        .header_Title {
            flex: 2;
            text-align: center;
        }

        .header_Title h1 {
            color: #023047;
            font-size: 2.5rem;
            margin: 0;
        }

        .logout h5 {
            color: #023047;
            cursor: pointer;
            padding: 10px;
            transition: color 0.3s ease;
        }

        .logout img {
            width: 30px;
            height: 30px;
        }

        /* Content Area */
        .contents {
            flex: 10;
            height: 100%;
            background-color: #f0f4f8;
            padding: 20px;
        }

        iframe {
            border: none;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Logout Confirmation */
        .logout-confirm {
            background-color: #023047;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .menubar {
                flex: 1;
                padding: 10px;
            }

            .header_Title h1 {
                font-size: 2rem;
            }

            .menubar ul li {
                padding: 10px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="main_div">
        <div class="menubar">

            <div class="main">
                <div class="heading">
                    <img src="../style/images/logo.png" alt="Master Budget" width="100px" >
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