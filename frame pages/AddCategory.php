<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Modern CSS Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Base Styles */
body {
    font-family: 'Segoe UI', 'Roboto', sans-serif;
    background-color: #f8f9fa;
    color: #333;
    line-height: 1.6;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 2rem;
}

/* Form Container */
form {
    width: 100%;
    max-width: 500px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
}

th {
    background-color: #2c3e50;
    color: white;
    padding: 1.25rem;
    font-size: 1.25rem;
    font-weight: 500;
}

td {
    padding: 1rem;
    border-bottom: 1px solid #e9ecef;
}

/* Form Elements */
input[type="text"],
input[type="number"],
input[type="date"],
select {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #ced4da;
    border-radius: 6px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
}

input[type="text"]:focus,
input[type="number"]:focus,
input[type="date"]:focus,
select:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    background-color: white;
}

input[readonly] {
    background-color: #e9ecef;
    color: #6c757d;
}

/* Radio Buttons */
.radio-group {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    align-items: center;
}

.radio-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-weight: 500;
    transition: color 0.3s ease;
}

input[type="radio"] {
    margin-right: 0.5rem;
    transform: scale(1.2);
    accent-color: #3498db;
}

.radio-label:hover {
    color: #3498db;
}

/* Buttons */
.button-group {
    display: flex;
    gap: 1rem;
    justify-content: center;
}

input[type="submit"],
input[type="reset"] {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

input[type="submit"] {
    background-color: #27ae60;
    color: white;
}

input[type="submit"]:hover {
    background-color: #219653;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

input[type="reset"] {
    background-color: #e74c3c;
    color: white;
}

input[type="reset"]:hover {
    background-color: #c0392b;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Responsive Design */
@media (max-width: 600px) {
    body {
        padding: 1rem;
    }
    
    table {
        display: block;
        overflow-x: auto;
    }
    
    td, th {
        padding: 0.75rem;
    }
    
    .radio-group {
        flex-direction: column;
        gap: 0.5rem;
        align-items: flex-start;
    }
    
    .button-group {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    input[type="submit"],
    input[type="reset"] {
        width: 100%;
    }
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

form {
    animation: fadeIn 0.5s ease-out;
}

/* Section Header */
h4 {
    font-size: 1.5rem;
    font-weight: 500;
    color: white;
    margin: 0;
}
    </style>
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