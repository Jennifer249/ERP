<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2018-01-07
 * Time: 19:21
 */
include("conn.php");
session_start();
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $orderno=$_POST['orderno'];//进仓单号
    $sql="SELECT * FROM `input` WHERE `ID`='$orderno'";
    $result=mysqli_query($conn,$sql);
    $i=0;
    while($row=mysqli_fetch_assoc($result))
    {
        $time=$row['time'];
        $origin=$row['origin'];
        $sqql="SELECT * FROM `buy` WHERE `ID`='$origin'";
        $res=mysqli_query($conn,$sqql);
        $roww=mysqli_fetch_assoc($res);
        $providerid=$roww['providerID'];
        $sss="SELECT * FROM `provider` WHERE `ID`='$providerid'";
        $resu=mysqli_query($conn,$sss);
        $rr=mysqli_fetch_assoc($resu);
        $pname=$rr['name'];
        $pid=$row['productID'];
        $ssql="SELECT * FROM `porduct` WHERE `ID`='$pid'";
        $re=mysqli_query($conn,$ssql);
        $roww=mysqli_fetch_assoc($re);
        $list[$i]=array(
            "brand"=>$roww['pinpai'],
            "papertype"=>$roww['type'],
            "level"=>$roww['jibie'],
            "g"=>$roww['kezhong'],
            "specifications"=>$roww['guige'],
            "unit"=>$row['weightd'],
            "innum"=>$row['inputweight'],
            "jiannum"=>$row['inputnum'],
            "storage"=>$row['kw']
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
            "list"=>$list,
            "papername"=>$pname,
            "salemaster"=>"",
            "buyno"=>$origin,
            "carno"=>"",
            "intime"=>$time
        );
    }
    echo json_encode($data);
}
else if($_SERVER['REQUEST_METHOD']=="GET")
{
    $btime=$_GET['beginTime'];
    $etime=$_GET['endTime'];
    $ssqq="SELECT * FROM `input` WHERE `time`>='$btime' AND `time`<='$etime'";
    $answer=mysqli_query($conn,$ssqq);
    $i=0;
    while($ree=mysqli_fetch_assoc($answer))
    {
        $originn=$ree['origin'];
        $ssss="SELECT * FROM `buy` WHERE `ID`='$originn'";
        $rees=mysqli_query($conn,$ssss);
        $roo=mysqli_fetch_assoc($rees);
        $pii=$roo['providerID'];
        $ei=$roo['employeeID'];
        $q="SELECT * FROM `provider` WHERE `ID`='$pii'";
        $d=mysqli_query($conn,$q);
        $e=mysqli_fetch_assoc($d);
        $pn=$e['name'];
        $b="SELECT * FROM `employee` WHERE `ID`='$ei'";
        $c=mysqli_query($conn,$b);
        $f=mysqli_fetch_assoc($c);
        $list[$i]=array(
            "inorderno"=>$ree['ID'],
            "customer"=>$pn,
            "saler"=>$f['name']
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