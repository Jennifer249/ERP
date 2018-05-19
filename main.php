<?php
/**
 * Created by PhpStorm.
 * User: Jennifer
 * Date: 2018-01-08
 * Time: 16:53
 */
include("conn.php");
//if($_GET['type']=="nowPlan")
//{
    $sql="SELECT * FROM `porduct` WHERE 1";
    $result=mysqli_query($conn,$sql);
    $n1=0;
    $n2=0;
    $n3=0;
    $n4=0;
    $n5=0;
    while($row=mysqli_fetch_assoc($result))
    {
        if($row['number']<=$row['lowestsave'])
        {
            $n1++;
        }
    }
    $ssql="SELECT * FROM `sale` WHERE 1";
    $re=mysqli_query($conn,$ssql);
    while($ro=mysqli_fetch_assoc($re))
    {
        $n2++;
    }
    $sqql="SELECT * FROM `buy` WHERE 1";
    $res=mysqli_query($conn,$sqql);
    while($roww=mysqli_fetch_assoc($res))
    {
        $n3++;
    }
    $ssqq="SELECT * FROM `sale` WHERE 1";
    $resu=mysqli_query($conn,$ssqq);
    while($roo=mysqli_fetch_assoc($resu))
    {
        $n4++;
    }
    $sqqll="SELECT * FROM `input` WHERE 1";
    $rr=mysqli_query($conn,$sqqll);
    while($ress=mysqli_fetch_assoc($rr))
    {
        $n5++;
    }
    $data=array(
        "n1"=>$n1,
        "n2"=>$n2,
        "n3"=>$n3,
        "n4"=>$n4,
        "n5"=>$n5,
        "success"=>true
    );
    echo json_encode($data);
//}