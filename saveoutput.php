<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/1/7
 * Time: 20:24
 */

include"conn.php";
$saleid = $_GET['saleno'];
mysqli_select_db($conn,"erp");
$i="OUT";
$out = "$saleid"."{$i}";
$sql="select * from sale where ID='$saleid'";
$res=mysqli_query($conn,$sql) or die('a'.mysqli_errno());
$dbrow=mysqli_fetch_array($res);


$pid = $dbrow['productID'];
$num= $dbrow['num'];
$weight= $dbrow['weight'];
$price= $dbrow['price'];
$cid=$dbrow['customerID'];
$eid=$dbrow['employeeID'];
$sum= $dbrow['sum'];

$exec = "INSERT INTO `output`(`ID`, `productID`, `weightd`, `numd`, `outputweight`, `outnum`, `price`, `sum`, `jh`, `saleID`, `time`, `employeeID`)
 VALUES ('$out','$pid','吨','张',
'$weight','$num','$price','$sum','','$saleid','','$eid')";
$res3=mysqli_query($conn,$exec) or die('a');

if ($res3) {
    $data = array(
        "success" => true,
    );
} else {

    $data = array(
        "success" => true,
    );
}
?>