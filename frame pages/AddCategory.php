<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/AddCategory.css">

</head>
<body>
    <form action="addCategoryphp.php" method="post">
        <table align="center">
            <tr><th colspan="2"><h4>Add Category</h4></th></tr>
            <tr>
                <td>Account No</td>
                <td><?php
                if(isset($_SESSION))
                {
                    /*echo"Session is Started";*/
                }
                else{
                    session_start();
                }
                $acn = $_SESSION['Accno'];
                echo "<input type='number' value='$acn' readonly>"?></td>
            </tr>
            <tr>
                <td>Category Name</td>
                <td><input type="text" name="txtcet" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <label for="rinc"><input type="radio" name="rtype" value="Income" id="rinc">Income</label>
                    <label for="rexp"><input type="radio" name="rtype" value="Expense" id="rexp">Expense</label>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <th colspan="2">
                    <input type="submit" value="Submit" id="submitbtn">
                    <input type="reset" value="Clear" id="resetbtn">
                </th>
            </tr>
        </table>
    </form>
</body>
</html>