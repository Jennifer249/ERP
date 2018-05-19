<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Content-type:text/html;charset=utf-8");

include("conn.php");
$provider="0";
if(assert($_POST['save'])){
    $length = count($_POST) / 5;//行数
    for ($i = 1; $i < $length; $i++) {
        $ii = "{$i}";
        $ID=$_POST["ID".$ii];
        $name=$_POST["name".$ii];
        $address=$_POST["address".$ii];//地址
        $bank=$_POST["bank".$ii];//银行账号
        $tele=$_POST["tele".$ii];//手机号
        $sql1="SELECT `ID`FROM `provider` WHERE ID='$ID'";
        $provider1=$conn->query($sql1);
        $result1=mysqli_num_rows( $provider1);
        if($result1>0)
        {
            echo"<script>alert('供应商已存在，请重新输入！');history.go(-1);</script>";break;
        }
        else{
        $sql = "INSERT INTO `provider`(`ID`, `name`, `address`, `bank`, `tele`) VALUES ('$ID','$name','$address','$bank','$tele') ";
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