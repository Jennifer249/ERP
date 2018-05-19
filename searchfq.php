<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/1/7
 * Time: 21:15
 */

include("conn.php");
$saleid = $_GET['saleno'];
//$saleid = '0002';
//$num=count($saleno);

//$sql="SELECT * FROM `sale`INNER JOIN `product`,ON sale.productID = product.ID WHERE `ID`='$saleid'";
$sql = "SELECT * FROM `output` WHERE `saleID`='$saleid'";
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
        "outno" => $re['ID'],
        "productID" => $re['productID'],
        "employeeID" => $re['employeeID'],
        "sum" => $re['sum'],


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
?>