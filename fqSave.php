<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/1/7
 * Time: 16:46
 */
include("conn.php");
//session_start();
if($_SERVER['REQUEST_METHOD']=="POST")
{
   // $employeeID=$_SESSION['ID'];
    $name=$_POST['number'];//供应商
    $ordertime=$_POST['ordertime'];//合同日期
    $ID=$_POST['ID'];//框架合同号
    $number=count($_POST);//post的总数
    $count=($number-6)/12;
    for($i=1;$i<=$count;$i++)
    {
        $ii="{$i}";
        $band="band".$ii;//品牌
        $pap="papertype"."{$i}";//纸种
        $level="level"."{$i}";//级别
        $weight="weight"."{$i}";//克重
        $format="format"."{$i}";//规格
        $ssum="ssum"."{$i}";//出厂价
        $jian="jian"."{$i}";//运费
        $symble="symble"."{$i}";//总价
        $sumaccount="sumaccount"."{$i}";//标准售价
        $vip="vip"."{$i}";//会员价
        $low="low"."{$i}";//最低库存
        $high="high"."{$i}";//最高库存
        //$ban=$_POST['band1'];
        $arr[$i]=array(
            "band"=>$_POST[$band],
            "papertype"=>$_POST[$pap],
            "level"=>$_POST[$level],
            "weight"=>$_POST[$weight],
            "format"=>$_POST[$format],
            "ssum"=>$_POST[$ssum],
            "jian"=>$_POST[$jian],
            "symble"=>$_POST[$symble],
            "sumaccount"=>$_POST[$sumaccount],
            "vip"=>$_POST[$vip],
            "low"=>$_POST[$low],
            "high"=>$_POST[$high]
        );
    }
    $ssql="SELECT * FROM `provider` WHERE `name`='$name'";
    $re=mysqli_query($conn,$ssql);
    $roww=mysqli_fetch_assoc($re);
    $pid=$roww['ID'];//供应商id
    $flag=0;
    for($j=1;$j<=$count;$j++)
    {
        $a=$arr[$j]['band'];
        $b=$arr[$j]['papertype'];
        $c=$arr[$j]['level'];
        $d=$arr[$j]['weight'];
        $e=$arr[$j]['format'];
        $sql="SELECT * FROM `porduct` WHERE `pinpai`='$a'AND `type`='$b'AND `jibie`='$c'AND `kezhong`='$d' AND `guige`='$e'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $arrr[$j]=array(
            'ID'=>$row['ID'],
            'we'=>$row['weightd']
        );
        $idd[$j]=$row['ID'];//获取商品的ID
        $we[$j]=$row['weightd'];
        $iid=$row['ID'];
        $sqql="SELECT * FROM `provideproduct` WHERE `provideID`='$pid'AND `productID`='$iid'";
        $res=mysqli_query($conn,$sqql);
        $roow=mysqli_num_rows($res);
        if($roow<=0)
        {
        }
        else
        {
            $flag++;
        }
    }
    if($flag==$count)
    {
        for($t=1;$t<=$count;$t++)
        {
            $pi=$arrr[$t]['ID'];//产品ID
            $ww=$arrr[$t]['we'];//产品重量单位
            $ssum=$arr[$t]['ssum'];//出厂价
            $sum=$arr[$t]['symble'];//总价
            $yunfei=$arr[$t]['jian'];
            $sqli="INSERT INTO `buy`(`ID`, `productID`, `weightd`, `weight`, `num`, `price`, `sum`, `employeeID`, `providerID`, `time`,`yunfei`,`hetong`)
 VALUES('','$pi','$ww','0','0','$ssum','$sum','$employeeID','$pid','$ordertime','$yunfei','$ID')";
            $resulti = mysqli_query($conn,$sqli);
            if (!$resulti)
            {
                //插入失败
                $data=array(
                    "success"=>false,
                    "count"=>$count
                );
            }
            else
            {
                $data=array(
                    "success"=>true,
                    "count"=>$count
                );
            }
        }
    }
    else
    {
        $data=array(
            "success"=>false,
            "count"=>$count
        );
    }
    echo json_encode($data);
}
