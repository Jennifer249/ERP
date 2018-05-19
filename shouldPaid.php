<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2018-01-07
 * Time: 10:31
 */
include("conn.php");
session_start();
if($_SERVER['REQUEST_METHOD']=="GET")
{
    $btime=$_GET['beginTime'];
    $etime=$_GET['endTime'];
    $sql="SELECT * FROM `outputmoney` WHERE `time`>='$btime'AND `time`<='$etime'";
    $result=mysqli_query($conn,$sql);
    $i=0;
    $ssum=0;
    while($row=mysqli_fetch_assoc($result))
    {
        $pid=$row['providerID'];
        $ssql="SELECT * FROM `provider` WHERE `ID`='$pid'";
        $re=mysqli_query($conn,$ssql);
        $roow=mysqli_fetch_assoc($re);
        $list[$i]=array(
            "supplier"=>$roow['name'],
            "time"=>$row['time'],
            "num"=>$row['ID'],
            "shouldpaid"=>$row['sum']
        );
        $ssum=$ssum+$row['sum'];
        $i++;
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