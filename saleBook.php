<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2018-01-05
 * Time: 9:37
 */
include("conn.php");
session_start();
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $employeeID=$_SESSION['ID'];
    $customer=$_POST['number'];//买方名称
    $ssql="SELECT * FROM `customer` WHERE `name`='$customer'";
    $re=mysqli_query($conn,$ssql);
    $r=mysqli_fetch_assoc($re);
    $cuID=$r['ID'];//客户号
    $hetong=$_POST['order1'];//合同号
    $orderno=$_POST['orderno'];//订单编号
    $ordertime=$_POST['ordertime'];//订单时间
    $cutpaid=$_POST['cutpaid'];//分切费
    $tranpaid=$_POST['tranpaid'];//运费
    $contractsum=$_POST['contractsum'];//合同总价
    $number=count($_POST);
    $count=($number-10)/9;
    $flag=0;
    for($i=1;$i<=$count;$i++)
    {
        $ii="{$i}";
        $band="band".$ii;//品牌
        $pap="papertype"."{$i}";//纸种
        $level="level"."{$i}";//级别
        $weight="weight"."{$i}";//克重
        $format="format"."{$i}";//规格
        $ssum="ssum"."{$i}";//数量（重量）
        $jian="jian"."{$i}";//件数/张数（数量）
        $symble="symble"."{$i}";//单价
        $sumaccount="sumaccount"."{$i}";//总价
        $arr[$i]=array(
            "band"=>$_POST[$band],
            "papertype"=>$_POST[$pap],
            "level"=>$_POST[$level],
            "weight"=>$_POST[$weight],
            "format"=>$_POST[$format],
            "ssum"=>$_POST[$ssum],
            "jian"=>$_POST[$jian],
            "symble"=>$_POST[$symble],
            "sumaccount"=>$_POST[$sumaccount]
        );
    }
    $flag=0;
    for($j=1;$j<=$count;$j++) {
        $a = $arr[$j]['band'];
        $b = $arr[$j]['papertype'];
        $c = $arr[$j]['level'];
        $d = $arr[$j]['weight'];
        $e = $arr[$j]['format'];
        $sql = "SELECT * FROM `porduct` WHERE `pinpai`='$a'AND `type`='$b'AND `jibie`='$c'AND `kezhong`='$d' AND `guige`='$e'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
       //$num=mysqli_num_rows($row);//查找是不是每一种商品我们公司都有卖
        if(!$row)
        {
        }
        else
        {
            $flag++;
            $arr[$j]['productID']=$row['ID'];//获取产品的ID号
        }

    }
    if($flag==$count)
    {
        $fflag=0;
        for($t=1;$t<=$count;$t++)
        {
            $prid=$arr[$t]['productID'];//产品id
            $numm=$arr[$t]['jian'];//产品数量
            $we=$arr[$t]['ssum'];//产品重量
            $price=$arr[$t]['symble'];//单价
            $sum=$arr[$t]['sumaccount'];//总价
            $sqll="INSERT INTO `sale`(`ID`, `productID`, `num`, `weight`, `price`, `sum`, `customerID`, `time`, `employeeID`, `bz`, `hetong`, `fqprice`, `yunprice`, `allsum`, `specialID`)
 VALUES ('$orderno','$prid','$numm','$we','$price','$sum','$cuID','$ordertime','$employeeID','无','$hetong','$cutpaid','$tranpaid','$contractsum','$orderno')";
            $res=mysqli_query($conn,$sqll);
            //生成特价表
            //先从采购单中获取价格
            $ssqql="SELECT * FROM `buy` WHERE `productID`='$prid'order by `time` DESC";
            $ree=mysqli_query($conn,$ssqql);
            $rrow=mysqli_fetch_assoc($ree);
            $pricee=$rrow['price'];
            $sss="INSERT INTO `special`(`ID`, `productID`, `price`)
VALUES ('$orderno','$prid','$pricee')";
            $rrr=mysqli_query($conn,$sss);
            if(!$res)
            {
                $fflag++;
            }
            else
            {
            }
       }
        if($fflag==0)
        {
            $data=array(
              "success"=>true
            );
        }
        else
        {
            $data=array(
                "success"=>false
            );
       }
    }
    else
    {
        $data=array(
            "success"=>false
        );
    }
    echo json_encode($data);
}
else if($_SERVER['REQUEST_METHOD']=="GET")
{
        $btime=$_GET['beginTime'];
        $etime=$_GET['endTime'];
        $ssql="SELECT * FROM `sale` WHERE `time`>='$btime'AND `time`<='$etime'";
        $r=mysqli_query($conn,$ssql);
        $i=0;
        while($re=mysqli_fetch_assoc($r))
        {
            $customerid=$re['customerID'];
            $sqql="SELECT * FROM `customer` WHERE `ID`='$customerid'";
            $resu=mysqli_query($conn,$sqql);
            $rr=mysqli_fetch_assoc($resu);
            $list[$i]=array(
                "ordertime"=>$re['time'],
                "orderno"=>$re['ID'],
                "customer"=>$rr['name'],
                "contractsum"=>$re['allsum'],
                "suretime"=>""
            );
            $i++;
        }
        if($i==0)
        {
            $data=array(
                "success"=>false
            );
        }
        else
        {
            $data=array(
                "success"=>true,
                "list"=>$list
            );
        }
        echo json_encode($data);

}