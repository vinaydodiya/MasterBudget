<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="shortcut icon" type="image/ico" href="style/images/logo.png">

    <link rel="stylesheet" href="style/login.css">
</head>
<body align="center">
    <div class="content" align="center">
    <div class="logout" align="left">
            <h5 onclick="back()"><abbr title="Back"><img src="style/images/back.svg" alt="Log Out" width="30px"></abbr></h5>
            <script>
                function back(){
                window.history.back();
            }
            </script>
        </div>
        <form action="createAccount.php" method="post" name="nsignup">
            <table align="center">
                <tr>
                    <th><h2 align="center">Create Account</h2></th>
                </tr>
                <tr>
                    <td>
                        <label>Name</label><BR>
                        <input type="text" name="iname" placeholder="First  Last" pattern="[A-Z][a-z]{20}" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>E-mail</label><BR>
                        <input type="email" name="iemail" placeholder="email@gmail.com" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Country</label><BR>
                        <?PHP 
                                include "connect.php";
                                //session_start();
                                $s = "select * from currency";
                                $q = mysqli_query($con,$s)
                                or 
                                die("Error in contry select");
                                echo "<select name='ict'>";
                                while($res = mysqli_fetch_array($q))
                                {
                                    echo "<option name='ict'>".$res['country_name']."</option>";
                                    
                                }
                                echo "</select>";
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>PASSWORD</label><BR>
                        <input type="password" name="ipassword" placeholder="********" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>CONFIRM PASSWORD</label><BR>
                        <input type="TEXT" name="iconfirm" placeholder="password" required>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                       <input type="button" name="icreate" align="center" value="Create" id="create" onclick="check()">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script>
        function check(){
            let pass = document.nsignup.ipassword.value
            let cnfm = document.nsignup.iconfirm.value
            var data = document.nsignup.iemail.value
            if(pass.length >=8){
                if (pass == cnfm){
                    nsignup.submit()
                    
                }
                else{
                    alert('Please, Enter Valid Password!')
                }
                nsignup.reset()
            }
            else{
                alert('Create Strong Password')
            }
        }

        /*
        send_data(data,"Sign Up")
        function send_data(data,type){
            var xml = new XMLHttpRequest();
            xml.onload = function(){
                if(xml.readyState == 4 || xml.status == 200){
                    alert(xml.responseText)
                }
                data.data_type = type
                var data_string = JSON.stringify(data);
                xml.open("POST","createAccount.php",true)
                xml.send(data)
            }
                
        }
*/
    </script>


</body>
</html>