<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Content-type:text/html;charset=utf-8");

include("conn.php");
$productID="0";
$providerID="0";
$weight_d="0";
$weight_sum=0;
$price=0;
$sum=0;
if(assert($_POST['save'])){
    $count1=count($_POST)-5;
    $length = $count1 / 8;//行数
    if($length<1){
        echo "<script>alert('没有内容，请重新输入');history.go(-1);</script>";
    }
    $num=$_POST["num"];
    for ($i = 1; $i < $length; $i++) {
        $ii = "{$i}";
        $bran=$_POST["brand".$ii];
        $kind=$_POST["kind".$ii];
        $rank=$_POST["rank".$ii];//级别
        $weight=$_POST["weight".$ii];//克重
        $specif=$_POST["specif".$ii];
        $w_unit=$_POST["w-unit".$ii];//重量单位
        $numID=$_POST["numID".$ii];//件号+进仓单号是验货单的主键
        $positionID=$_POST["positionID".$ii];//库位号
        $w_inputID=$_POST["w-inputID1"];//进仓单号
        $provider=$_POST["provider1"];//供应商
        $purchaseID=$_POST["purchaseID1"];//采购单号
        $exam_date=$_POST["examdate1"];//进仓日期
       // echo "$exam_date";
        if($provider==null||$purchaseID==null||$exam_date==null||$w_inputID==null||$numID==null){
            echo "<script>alert('内容不全请重新输入！');history.go(-1);</script>";break;
        }
        $sql6="SELECT `jh` FROM `test` WHERE jh='$numID'";
        $pro1=$conn->query($sql6);
        $resultt=mysqli_num_rows( $pro1);
        if($resultt>0)
        {
            echo"<script>alert('已验货，请重新输入！');history.go(-1);</script>";break;
        }
        else{
            $sql1 = "SELECT `ID` FROM `porduct` WHERE pinpai='$bran'AND type='$kind'AND jibie='$rank'AND kezhong='$weight'AND guige='$specif' ";
            $productID1 = $conn->query($sql1);
            while($row1=mysqli_fetch_array($productID1)){
                $productID=$row1[0];
            }
            //echo "$productID";
            $sql5="SELECT `price` FROM `porduct` WHERE pinpai='$bran'AND type='$kind'AND jibie='$rank'AND kezhong='$weight'AND guige='$specif'";
            $price1=$conn->query($sql5);
            while($row5=mysqli_fetch_array($price1)){
                $price=$row5[0];
            }
            //echo"$price ";
            $sum=$sum+$price;
            //echo"$sum ";
            $sql2 = "SELECT `ID` FROM `provider` WHERE name='$provider'";
            $provider1=$conn->query($sql2);
            while($row2=mysqli_fetch_array($provider1)){
                $providerID=$row2[0];
            }
            //echo"$providerID ";
//             echo" $exam_date ";
//             echo" $purchaseID ";
//             echo" $w_unit ";
//             echo" $w_inputID ";

        $sql = "INSERT INTO `test`(`jh`, `inputID`, `providerID`, `buyID`, `time`, `productID`, `weightd`, `kwID`) VALUES ('$numID','$w_inputID','$providerID','$purchaseID','$exam_date','$productID','$w_unit','$positionID') ";
        $sql4= "INSERT INTO `input`(`ID`, `productID`, `numd`, `weightd`, `inputweight`, `inputnum`, `kw`, `flag`, `origin`, `time`, `bz`, `price`, `jh`, `sum`, `employeeID`)VALUES ('$w_inputID','$productID','件','$w_unit','0','$num','$positionID','1','$purchaseID','$exam_date','无','$price','$numID','$sum','100')";
        $result = mysqli_query($conn, $sql);
        $result11=mysqli_query($conn,$sql4);
            if(!$result){
                echo "<script>alert('验货失败！');history.go(-1);</script>";break;
            }
            if(!$result11){
                echo "<script>alert('入库单生成失败！');history.go(-1);</script>";break;
                }
            if($result&&$result11){
                echo "<script>alert('保存成功！');history.go(-1);</script>";
            }
            else{
                echo "<script>alert('保存失败！');history.go(-1);</script>";
            }
        }
}
}

?>