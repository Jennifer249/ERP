<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Content-type:text/html;charset=utf-8");

include("conn.php");
$flagg=0;
if(assert($_POST['save'])){
    $length = count($_POST) / 5;//行数
    if($length<1){
        echo "<script>alert('没有内容，请重新输入');history.go(-1);</script>";
    }
    else{
        for ($i = 1; $i < $length; $i++) {
            $ii = "{$i}";
            $ID=$_POST["ID".$ii];//ID
            $name = $_POST["name" . $ii];//姓名
            $address = $_POST["address" . $ii];//地址
            $bank = $_POST["bank" . $ii];//银行卡号
            $tele=$_POST["tele".$ii];//电话
            $flag=$_POST["flag".$ii];//会员？
            //加一个是否会员
            if($flag=="会员"){
                $flagg=1;
            }
            if($ID==null||$name==null||$address==null||$bank==null||$tele==null){
                echo "<script>alert('内容不全，请重新输入');history.go(-1);</script>";
                break;
            }
            else{
                $sqll="SELECT `ID`  FROM `customer` WHERE ID='$ID'";
                $pro1=$conn->query($sqll);
                $resultt=mysqli_num_rows( $pro1);
                if($resultt>0)
                {
                    echo"<script>alert('客户已存在，请重新输入！');history.go(-1);</script>";break;
                }
                else{
                $sql = "INSERT INTO `customer`(`ID`, `name`, `address`, `bank`, `tele`,`flag`) VALUES ('$ID','$name','$address','$bank','$tele','$flagg') ";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "<script>alert('保存失败！');history.go(-1);</script>";break;
                } else {
                    echo "<script>alert('保存成功！');history.go(-1);</script>";break;
                }
            }
            }
        }
    }

}

?>