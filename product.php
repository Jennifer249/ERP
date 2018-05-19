<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Content-type:text/html;charset=utf-8");

include("conn.php");

if(assert($_POST['save'])){
    $length = count($_POST) / 14;//行数
    if($length<1){
        echo "<script>alert('没有内容，请重新输入');history.go(-1);</script>";
    }
    else{
        for ($i = 1; $i < $length; $i++) {
            $ii = "{$i}";
        $pID=$_POST["pID".$ii];//商品ID
        $bran = $_POST["brand" . $ii];//品牌
        $kind = $_POST["kind" . $ii];//纸种
        $rank = $_POST["rank" . $ii];//级别
        $weight = $_POST["weight" . $ii];//克重
        $specif = $_POST["specif" . $ii];//规格
        $price = $_POST["price" . $ii];//单价
        $w_unit = $_POST["w-unit" . $ii];//重量单位
        $n_unit = $_POST["n-unit" . $ii];//数量单位
        $n_position=$_POST["n-position".$ii];//目前库存
        $bzprice=$_POST["bzprice".$ii];//标准售价
        $yhprice=$_POST["yhprice".$ii];//会员售价
        $lowestsave=$_POST["lowestsave".$ii];//最低库存
        $highestsave=$_POST["highestsave".$ii];//最高库存
        if($pID==null||$length==null){
            echo "<script>alert('内容不全，请重新输入');history.go(-1);</script>";
            break;
        }
        else{
            $sql1="SELECT `ID`  FROM `porduct` WHERE ID='$pID'";
            $pro1=$conn->query($sql1);
            $resultt=mysqli_num_rows( $pro1);
            if($resultt>0)
            {
                echo"<script>alert('商品已存在，请重新输入！');history.go(-1);</script>";break;
            }
            else{
                $sql = "INSERT INTO `porduct`(`ID`, `pinpai`, `type`, `jibie`, `kezhong`, `guige`, `price`, `weightd`, `numd`, `number`, `bzprice`, `yhprice`, `lowestsave`, `highestsave`)VALUES ('$pID','$bran','$kind','$rank','$weight','$specif','$price','$w_unit','$n_unit','$n_position','$bzprice','$yhprice','$lowestsave','$highestsave') ";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "<script>alert('保存失败！');history.go(-1);</script>";break;
                }
                else {
                    echo "<script>alert('保存成功！');history.go(-1);</script>";break;
                }
            }
        }
    }
    }
}

?>