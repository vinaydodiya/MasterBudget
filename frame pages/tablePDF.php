
<?php

include 'connect.php';
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js">
    </script>
        <link rel="stylesheet" href="../style/report.css">

</head>

<body>
<!--  start  Heading Title    -->

<div class="heading-main">

<div class="htitle">
    <h1>Transactions</h1>
</div>
<div class="filterbtn">
    <button id="filter-btn" onclick="showFilter()"><img src="../style/images/filtericon.svg" alt="🔍" width="20px"></button>
    
</div>
</div>
    <!--  End  Heading Title    -->

<div class="filterDate">
    <form action="tablePDF.php" method="post" name="filter">
        <!--<input type="search" name="searchID" id="searchid" placeholder="Transaction ID">-->
        <input type="search" name="searchName" id="searchname" placeholder="Search">
        <!--<input type="search" name="searchType" id="searchtype" placeholder="Type">
        <input type="search" name="searchCategory" id="searchcategory" placeholder="Category">
        <input type="search" name="searchMethod" id="searchmethod" placeholder="Method">
        <input type="search" name="searchAmount" id="searchamount" placeholder="Amount">-->
        <input type="date" name="from" id="from" required>  
        <input type="date" name="to" id="to" required>
        <button type="submit" name="submit">Filter</button>
    </form>
</div>
</div>

<div class="Transaction">
<div class="trantable">
<table border=2px cellspacing=0 cellpadding=15px align=center id="transaction-table">
    <thead>
        <tr>
            
            <th>Transaction ID</th>
            <th>Transaction Name</th>
            <th>Type</th>
            <th>Category</th>
            <th>Method</th>
            <th>Memo</th>
            <th>Transaction Date</th>
            <th>Date</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        ';
            $frmdate = date('01-01-Y', strtotime(date("d-m-Y")));
            $todate = date("d-m-Y");
            $Accno = $_SESSION['Accno'];
            //isset ($_POST['searchID']) ? $sid = $_POST['searchID'];
            isset ($_POST['searchName']) ? $sname = $_POST['searchName'] : $sname = '';
            if(isset($_POST['from']) && isset($_POST['to'])){
                $from = $_POST['from'];
                $to = $_POST['to'];
            }
            else{
                $from = $frmdate;
                $to = $todate;
            }


            /*isset ($_POST['from']) ? $from = $_POST['from'] : $from = $frmdate;
            isset ($_POST['to']) ? $to = $_POST['to'] : $to = $todate;*/
            /*isset ($_POST['searchType']) ? $stype = $_POST['searchType'];
            isset ($_POST['searchCategory']) ? $scategory = $_POST['searchCategory'];
            isset ($_POST['searchMethod']) ? $smethod = $_POST['searchMethod'];
            isset ($_POST['searchAmount']) ? $samount = $_POST['searchAmount'];*/
            /*$sid = $_POST['searchID'];
            $sname = $_POST['searchName'];
            $stype = $_POST['searchType'];
            $scategory = $_POST['searchCategory'];
            $smethod = $_POST['searchMethod'];
            $samount = $_POST['searchAmount'];
*/

          
            //$from1 = $_POST['from'];
            //$to1 = $_POST['to'];
            /*
            echo "<br>Date from input <br>".$from1. "      ";
            echo $to1;
            echo "<br>Date default <br>".$from. "      ";
            echo $to;*/
            if(isset($_POST['submit'])){
                $s = "select * from transactions where account = '$Accno' and (tran_id like '%$sname%' or tranname like '%$sname%' or type like '%$sname%' or cetegory like '%$sname%' or method like '%$sname%' or amount ='$sname') and tran_date between '$from' and '$to' order by Tran_date";
            }
            else{
                $s = "select * from transactions where account = '$Accno' order by date desc";
            }
        //$s = "select * from transactions where account = '$Accno' order by date desc";
        $q = mysqli_query($con,$s)
        or
        die("Error in transaction data selection");
        $inc =0;
        $expc = 0;
        $bal = 0;
        while($res = mysqli_fetch_array($q))
        {
            echo '<tr><td>'.$res['tran_id'].'</td>';
            // echo '<td>'.$res['account'].'</td>';
            echo '<td>'.$res['tranname'].'</td>';
            echo '<td>'.$res['type'].'</td>';
            echo '<td>'.$res['cetegory'].'</td>';
            echo '<td>'.$res['method'].'</td>';
            echo '<td>'.$res['memo'].'</td>';
            echo '<td>'.$res['tran_date'].'</td>';
            echo '<td>'.$res['date'].'</td>';
            echo '<td align=right>'.$res['amount'].'</td></tr>';
            if ($res['type'] == 'Income'){
                $inc = $inc + $res['amount'];
                $bal = $bal + $res['amount'];
                
            }
            else if($res['type'] == 'Expense'){
                $expc = $expc + $res['amount'];
                $bal = $bal - $res['amount'];
                
            }
        }
        ?>
    </tbody>
</table>
</div>
</div>
    <!-- PDF button -->
     <div class="pdfbtn" align="center">
    <button id="download-btn">
        Download PDF
    </button>
    </div>

    <script>
        let download_button = document.getElementById("download-btn");
        let table = document.getElementById("transaction-table");

                // var from = document.getElementById("from").value;
                // var to = document.getElementById("to").value;
                 var fm = document.filter.from.value;
                 var tm = document.filter.to.value;
                // var fm = JSON.parse(from);
                // var tm = JSON.parse(to);
    const fvalue = JSON.parse('<?= json_encode($from); ?>');
    const tvalue = JSON.parse('<?= json_encode($to); ?>');

                var date_data = ('Date From : ' + fvalue + ' To : ' + tvalue);
                console.log(date_data);
        download_button.addEventListener
            ("click", function () {
                const tableData = [];
                const rows = table.rows;
                for (let i = 0; i < rows.length; i++) {
                    const rowData = [];
                    const cells = rows[i].cells;
                    for (let j = 0; j < cells.length; j++) {
                        rowData.push(cells[j].innerText);
                    }
                    tableData.push(rowData);
                }
                
                const docDefinition = {
                    content: [
                        {
                            text: 'Transaction Details',
                            style: 'header'
                        },
                        {
                            text: date_data,
                            style: 'headerDate'
                        },
                        {
                            table: {
                                widths:['*','*','*','*','*','*','*','*','*'],
                                body: tableData
                            }
                        }
                    ],
                    defaultStyle: {
                        fontSize: 8
                    },
                    styles: {
                        header:{
                            fontSize: 16,
                            margin: [10, 10, 10, 10],
                            bold: true,
                            alignment: 'center',
                            color: '#023047'
                        },
                        headerDate:{
                            fontSize: 10,
                            color: '#023047'
                        },
                        anotherStyle: {
                            italics: true,
                            alignment: 'right'
                        }         
                    }
                };

                pdfMake.createPdf(docDefinition).download('Transaction-table.pdf');
            });
    </script>
    <script>
        function showFilter() {
            let filter = document.querySelector(".filterDate");
            if (filter.style.display === "none") {
                filter.style.display = "flex";
            } else {
                filter.style.display = "none";
            }
        }
    </script>
</body>
</html>