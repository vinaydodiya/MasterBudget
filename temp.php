<?php 
include 'connect.php';
/*
$s = "select * from income";
$sql=mysqli_query($con,$s); 
$result=mysqli_fetch_assoc($sql);
$resu=$result['account'];

$booksArray = array("Book-1", "Book-2", "Book-3");
?>

<a href="chrome://downloads/.<?php echo $resu?>.pdf">Download File </a>

<link rel="shortcut icon" type="image/ico" href="style/images/favicon.ico">

<script type="text/javascript">
var books = JSON.parse('<?= json_encode($booksArray); ?>');
console.log(books[2]); // Output will be: Book-3
// OR
alert(books[0]); // Output will be: Book-1
</script>*/

// -------------insert income data into transactions------------
/*
$s = "select * from income";
$sql=mysqli_query($con,$s); 
while($res = mysqli_fetch_array($sql))
{
    $t1 = $res['account'];
    $t2 = $res['tran_id'];
    $t3 = $res['tranname'];
    $t4 = $res['category'];
    $t5 = $res['trandate'];
    $t6 = $res['type'];
    $t7 = $res['method'];
    $t8 = $res['amount'];
    $t9 = $res['tranname'];
    $dt = date("Y-m-d h:i:sa");

    $it = "insert into transactions values('$t1',$t2,'$t3','$t4','$t5','$t6','$t7',$t8,'$t9','$dt')";
    $iqt = mysqli_query($con,$it)
    or 
    die("error in insert income into transaction"); 
}
$e = "select * from expense";
$esql=mysqli_query($con,$e); 
while($eres = mysqli_fetch_array($esql))
{
    $et1 = $eres['account'];
    $et2 = $eres['tran_id'];
    $et3 = $eres['tranname'];
    $et4 = $eres['category'];
    $et5 = $eres['trandate'];
    $et6 = $eres['type'];
    $et7 = $eres['method'];
    $et8 = $eres['amount'];
    $et9 = $eres['tranname'];
    $dt = date("Y-m-d h:i:sa");
    
    $te = "insert into transactions values('$et1',$et2,'$et3','$et4','$et5','$et6','$et7',$et8,'$et9','$dt')";
    $iqt = mysqli_query($con,$te)
    or 
    die("error in insert expense into transaction"); 
}*/
/*
echo "
<script>
    
    window.open('index.php','_self');
</script>
";*/

/* transaction */

if(isset($_SESSION))
{
    /*echo"Session is Started";*/
}
else{
    session_start();
}
$Accno = $_SESSION['Accno'];
/*echo $_SESSION['Accno'];
echo $_SESSION['MyEmail'];*/

$s = "select * from transactions where account = '$Accno' order by date desc";
$q = mysqli_query($con,$s)
or
die("Error in transaction data selection");

echo '
<!DOCTYPE html>
<html lang="en">
<head>
<title>Transaction</title>
<link rel="shortcut icon" type="image/ico" href="style/images/favicon.ico">
<style>
    body{
        background-color: white;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 14px;
        position: relative;
        overflow: hidden;
    
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
    }
    button{
        background-color: rgb(0, 136, 0);
        color: white;
        padding: 3px 15px;
    }
    .Transaction{
        display: flex;
        justify-content: space-evenly;
        
    }
    .data{
        background-color: whitesmoke;
        border: 2px solid rgb(92, 122, 128);
        border-radius: 15px;
        padding:20px;
        width:160px;
       
    }
    .trantable{
        height: 400px;
        overflow-y: scroll;

    }
    .trantable::-webkit-scrollbar {
        display: none;
    }
    table{
        background-color: whitesmoke;
        width: 95%;
        word-break: keep-all;
        
    }
    th{
        background-color: #023047;
        color: white;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js">
</script>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js">
    </script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js">
    </script>
</head>
<body>
<div class="heading">
<h1>Transaction</h1>
<a href="newtransactions.php"><button><h4>New Transaction</h4></button></a>
</div>

</div>
<div class="Transaction">
<div class="trantable">
<table border=2px cellspacing=0 cellpadding=15px align=center id="transaction-table">
<thead>
<tr>
<th>Account</th>
<th>Transaction ID</th>
<th>Transaction Name</th>
<th>Transaction Date</th>
<th>Amount</th>
<th>Type</th>
<th>Category</th>
<th>Memo</th>
<th>Date</th>
</tr>
</thead>
    <tbody>';
$inc =0;
$expc = 0;
$bal = 0;
while($res = mysqli_fetch_array($q)){
            echo '<tr><td>'.$res['account'].'</td>';
            echo '<td>'.$res['tran_id'].'</td>';
            echo '<td>'.$res['tranname'].'</td>';
            echo '<td>'.$res['tran_date'].'</td>';
            echo '<td align=right>'.$res['amount'].'</td>';
            echo '<td>'.$res['type'].'</td>';
            echo '<td>'.$res['method'].'</td>';
            echo '<td>'.$res['memo'].'</td>';
            echo '<td>'.$res['date'].'</td></tr>';
            if ($res['type'] == 'Income'){
                $inc = $inc + $res['amount'];
                $bal = $bal + $res['amount'];
                
            }
            else if($res['type'] == 'Expense'){
                $expc = $expc + $res['amount'];
                $bal = $bal - $res['amount'];
                
            }
        }
echo '
        
    </tbody></table>
    </div>
    <div class="counters">
    <div class="counter">
    <div class="data">
            <h3>Total Income</h3>
            <h4 align=center>'.$_SESSION['country_symbol'].' '.$inc.'</h4>
        </div>
        <div class="data">
            <h3>Total Expenses</h3>
            <h4 align=center>'.$_SESSION['country_symbol'].' '.$expc.'</h4>
        </div>
        <div class="data">
            <h3>Total Balance</h3>
            <h4 align=center>'.$_SESSION['country_symbol'].' '.$bal.'</h4>
        </div>
        
    </div>
    </div>
</div>   
<div class="downloads">
<button id="download-btn">
        Download PDF
    </button>



</body>
</html>';


?>
