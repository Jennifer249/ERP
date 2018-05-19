<?php


session_start();


//$employeeID=$_SESSION['ID'];

include("conn.php");
$saleid = $_GET['saleno'];
mysqli_select_db($conn,"erp");
//$num=count($saleno);

//$sql="SELECT * FROM `sale`INNER JOIN `product`,ON sale.productID = product.ID WHERE `ID`='$saleid'";
    $sql = "SELECT * FROM `sale` WHERE `ID`='$saleid'";
    $r = mysqli_query($conn, $sql);
    $i = 0;
    while ($re = mysqli_fetch_assoc($r)) {
//
//    $a="productno"."{$i}";
//    $b="num"."{$i}";
//    $c="weight"."{$i}";
//    $d="price"."{$i}";
//    $e="customerID"."{$i}";
//    $f="employeeID"."{$i}";
//    $g="total"."{$i}";
//
//        $a = "productno";
//        $b = "num";
//        $c = "weight";
//        $d = "price";
//        $e = "customerID";
//        $f = "employeeID";
//        $g = "total";
        $list[$i] = array(
//            "outputno"=>$re[],
            "productno" => $re['productID'],
            "num" => $re['num'],
            "weight" => $re['weight'],
            "price" => $re['price'],
            "customerID" => $re['customerID'],
            "employeeID" => $re['employeeID'],
            "total" => $re['sum'],

        );
        $i++;
    }
    if ($i == 0) {
        $data = array(
            "success" => false,
        );
    } else {

        $data = array(
            "success" => true,
            "list" => $list
        );
    }
    echo json_encode($data);

$output = $saleid."OUT";

mysqli_select_db($conn,"erp");
//for($i=0; $i<$num;$i++)
//{
//$num=$cno[$i];
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



?>