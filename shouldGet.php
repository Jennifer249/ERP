<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2018-01-07
 * Time: 9:48
 */
include("conn.php");
session_start();
if($_SERVER['REQUEST_METHOD']=="GET")
{
    $btime=$_GET['beginTime'];
    $etime=$_GET['endTime'];
    $sql="SELECT * FROM `inputmoney` WHERE `time`>='$btime'AND `time`<='$etime'";
    $result=mysqli_query($conn,$sql);
    $i=0;
    $ssum=0;
    while($row=mysqli_fetch_assoc($result))
    {
        $cid=$row['customerID'];
        $ssql="SELECT * FROM `customer` WHERE `ID`='$cid'";
        $re=mysqli_query($conn,$ssql);
        $roow=mysqli_fetch_assoc($re);
        $list[$i]=array(
            "customer"=>$roow['name'],
            "time"=>$row['time'],
            "num"=>$row['ID'],
            "shouldget"=>$row['sum']
        );
        $i++;
        $ssum+=$row['sum'];
    }
    if($i==0)
    {
        $data=array(
            "success"=>false,
            "tbegin"=>$btime,
            "tend"=>$etime,
            "t1"=>$ssum
        );
    }
    else
    {
        $data=array(
            "success"=>true,
            "list"=>$list,
            "tbegin"=>$btime,
            "tend"=>$etime,
            "t1"=>$ssum
        );
    }
    echo json_encode($data);
}