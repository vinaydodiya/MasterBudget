<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MASTER BUDJET</title>
    <link rel="shortcut icon" type="image/ico" href="../MasterBudgets/style/images/logo.png" >
    <link rel="stylesheet" href="style/mainPage.css">
    
    
    <style>
        body {
            
            font-family: verdana;
            font-size: 14px;
        }
        #popup{
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(240, 255, 255);
            width: 98vw;
            height: 100vh;
            
        }
        .loginPopup{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
.contents{
    
    width: 50%;
    background-color: rgb(218, 235, 234);
    box-shadow: 1px 1px 10px black;
    border-radius: 2%;
}

table{
   
    padding: 50px;
}

input{
    width: 90%;
    padding: 10px;
    margin: 10px;
}

#textarea{
    width: 90%;
    padding: 10px;
    margin: 10px;
}

label{
    padding: 10px;
}

#submit{
    color: white;
    background-color: forestgreen;
}
#create{
    color: white;
    background-color:dodgerblue;
}
    </style>

</head>
<body>
    <div class="heading">
        <header>
            <img src="../MasterBudgets/style/images/logo.png" alt="" height="100px" width="100px" id="logoimg">
            <div class="navmenu">
                <ul>
                    <li onclick="window.scrollTo(0, 0);"><a href="">About</a></li>
                    <li onclick="window.scrollTo(0, 750);"><a href="">Features</a></li>
                    <li onclick="window.scrollTo(0, 1300);"><a href="">Contact</a></li>
                    <li><a href="login.html">Login / Sign Up</a></li>
                </ul>
            </div>
        </header>

        <div class="title">
            <h1>MASTER BUDGET</h1>
            <p>BUDGET YOUR PERSONAL FINANCE</p>
            <a href="login.html"><input class="getstart" type="submit" value="Get Start"></a>
        </div>
    </div>
<div class="fetures">
    <h1 align="center">Features</h1>
    <div class="content">
        <a ><div class="block">
        <p>Dashboard</p>
            <h1>➡️</h1>
        </div></a>
        <a ><div class="block">
            <p>Income</p>
            <h1>➡️</h1>
        </div></a>
        <a ><div class="block">
            <p>Expense</p>
            <h1>➡️</h1>
        </div></a>
        <a><div class="block">
            <p>Investment</p>
            <h1>➡️</h1>
        </div></a>
        <a><div class="block">
            <p>Tax Benefits</p>
            <h1>➡️</h1>
        </div></a>
        <a><div class="block">
            <p>Reports</p>
            <h1>➡️</h1>
        </div></a>
    </div> 
    </div>
    <div class="contact">
        <h1 align="center">Contact US</h1>
        <p align="center">Please use the form below to contact us. We will get back to you as quick as possible!</p>

        <form action="mailto:vinaydodiya22@gmail.com" method="post" enctype="text/plain">
            <input type="email" placeholder="Email"class="inputtext" name="E-MAIL ID" required><br>
            <input type="text" placeholder="Subject" class="inputtext" name="Subject" required><br>
            <textarea name="mailmessage" id="" placeholder="Message" class="inputtext" rows="5" required></textarea><br>
            <input type="submit" class="inputtext" id="btnsend">
        </form>
    </div>
    <footer>
        <div class="links">
            <a href="#">🌐</a>
            <a href="#">🪟</a>
            <a href="#">📧</a>
        </div>
        <span align="center"><br>© Master Budget Since 2025</span>
    </footer>
</body>
</html>