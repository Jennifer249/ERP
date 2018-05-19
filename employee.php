<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Content-type:text/html;charset=utf-8");
include("conn.php");
if(assert($_POST['save'])){
    $length = count($_POST) / 3;//行数
    if($length<1){
        echo "<script>alert('没有内容，请重新输入');history.go(-1);</script>";
    }
    else{
        for ($i = 1; $i < $length; $i++) {
            $ii = "{$i}";
            $ID=$_POST["ID".$ii];//ID
            $name = $_POST["name" . $ii];//姓名
            $zw=$_POST["zw".$ii];//职务
            $flag="0";//用户
            if($ID==null||$name==null||$zw==null){
                echo "<script>alert('内容不全，请重新输入');history.go(-1);</script>";
                break;
            }
            else{
                $sql1="SELECT * FROM `employee` WHERE ID='$ID'";
                $result1 = mysqli_query($conn, $sql1);
                $result2=mysqli_num_rows( $result1);
                if($result2>0) {
 //                    if ($zw == "仓管") {
//                        $flag = "1";
//                    }
//                echo"$flag";
                    $sql = "UPDATE `employee` SET `zw`='$zw' WHERE ID='$ID'";
                    //$sql="INSERT INTO `zw`(`ID`, `name`, `zw`, `flag`) VALUES ('$ID','$name','$zw','$flag')";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        echo "<script>alert('保存失败！');history.go(-1);</script>";
                        break;
                    } else {
                        echo "<script>alert('保存成功！');history.go(-1);</script>";
                        break;
                    }
                }
            else{
                echo "<script>alert('此人未注册！');history.go(-1);</script>";
            }
            }
        }
    }
}

?>