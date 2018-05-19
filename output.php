<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Content-type:text/html;charset=utf-8");
include("conn.php");

$productID="0";//商品ID
$weight_d="0";//重量单位
$num_d="0";//数量单位
$price_dan=1.0;//单价
$sale_ID="0";//销售单号
$customer_name="0";//客户简称
$employee_ID="0";
$ID_out="0";
if(assert($_POST['save'])){
    $length = count($_POST) / 16;//行数
    if($length<1){
        echo "<script>alert('没有内容，请重新输入');history.go(-1);</script>";
    }
    for ($i = 1; $i < $length; $i++) {
        $ii = "{$i}";
        $bran = $_POST["brand" . $ii];//品牌
        $kind = $_POST["kind" . $ii];//纸种
        $rank = $_POST["rank" . $ii];//级别
        $weight = $_POST["weight" . $ii];//克重
        $specif = $_POST["specif" . $ii];//规格
        $w_unit = $_POST["w-unit" . $ii];//重量单位
        $num_unit = $_POST["num-unit" . $ii];//数量单位
        $w_output = $_POST["w-output" . $ii];//出仓重量
        $n_output = $_POST["n-output" . $ii];//出仓数量
        $price = $_POST["price" . $ii];//单价
        $numID = $_POST["numID" . $ii];//件号
        $customer = $_POST["customer" . $ii];//客户简称
        $outdate = $_POST["outdate" . $ii];//出仓日期
        $saleID = $_POST["saleID" . $ii];//销售单号
        $outID = $_POST["outID" . $ii];//出仓单号
        $staff = $_POST["staff" . $ii];//处理人名
        $total = $_POST["total" . $ii];//总金额

        //`ID`, `productID`, `weightd`, `numd`, `outputweight`, `outnum`, `price`, `sum`, `jh`, `saleID`, `time`, `employeeID`
        $sql1 = "SELECT `ID` FROM `porduct` WHERE pinpai='$bran'AND type='$kind'AND jibie='$rank'AND kezhong='$weight'AND guige='$specif' ";
        $productID1 = $conn->query($sql1);
        while ($row1 = mysqli_fetch_array($productID1)) {
            $productID = $row1[0];
        }
        //echo"$productID";
        $sql3 = "SELECT `weightd` FROM `porduct` WHERE pinpai='$bran'AND type='$kind'AND jibie='$rank'AND kezhong='$weight'AND guige='$specif' ";
        $weight_d1 = $conn->query($sql3);
        while ($row3 = mysqli_fetch_array($weight_d1)) {
            $weight_d = $row3[0];
        }
        //echo"$weight_d";
        $sql4 = "SELECT `numd` FROM `porduct` WHERE pinpai='$bran'AND type='$kind'AND jibie='$rank'AND kezhong='$weight'AND guige='$specif' ";
        $num_d1 = $conn->query($sql4);
        while ($row4 = mysqli_fetch_array($num_d1)) {
            $num_d = $row4[0];
        }
        //echo "$num_d";

        $sql6 = "SELECT `ID` FROM `employee` WHERE name='$staff' ";
        $employee1 = $conn->query($sql6);
        while ($row6 = mysqli_fetch_array($employee1)) {
            $employee_ID = $row6[0];
        }
        $sql7="SELECT `ID` FROM `output` WHERE ID='$outID'";
        $ID_out1=$conn->query($sql7);
        $resultt=mysqli_num_rows( $ID_out1);
        if($resultt>0)
        {
            echo"<script>alert('出仓单已存在，请重新输入！');history.go(-1);</script>";break;
        }
        //echo"$employee_ID";
        else{
            $sql = "INSERT INTO `output`(`ID`, `productID`, `weightd`, `numd`, `outputweight`, `outnum`, `price`, `sum`, `jh`, `saleID`, `time`, `employeeID`)VALUES ('$outID','$productID','$weight_d','$num_d','$w_output','$n_output','$price','0','$numID','$saleID','$outdate','$employee_ID')";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo "<script>alert('保存失败！');history.go(-1);</script>";
            } else {
                echo "<script>alert('保存成功！');history.go(-1);</script>";
            }
        }
    }
}

?>