<?php
$mysqli = new mysqli("localhost", "root", "", "masterbudget");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$data = json_decode($_POST['data'], true);

foreach ($data as $row) {
    $stmt = $mysqli->prepare("UPDATE transactions SET /*account=?,*/ tranname=?, cetegory=?, /*tran_date=?,*/  /*type=?,*/ method=?, amount=? /*date=?*/ WHERE tran_id=?");
    $stmt->bind_param("sssid", /*$row['account'],*/ $row['tranname'], $row['cetegory'], /*$row['trandate'],*/ /*$row['type'],*/  $row['method'], $row['amount'], /*$row['date'],*/ $row['tran_id']);
    $stmt->execute();
}


// foreach ($data as $row) {
//     $stmt = $mysqli->prepare("UPDATE income SET tranname=?, category=?, method=?,  amount=? WHERE tran_id=?");
//     $stmt->bind_param("sssid", $row['tranname'], $row['cetegory'],  $row['method'], $row['amount'], $row['tran_id']);
//     $stmt->execute();
// }

echo "Data Updated Successfully!";
?>
