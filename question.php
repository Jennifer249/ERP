<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2018-01-08
 * Time: 19:34
 */
include("conn.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $orderno=$_POST['orderno'];
    $sql="SELECT * FROM `question` WHERE `jh`='$orderno'";
    $result=mysqli_query($conn,$sql);
    $i=0;
    while($row=mysqli_fetch_assoc($result))
    {
        $pid=$row['productID'];
        $s="SELECT * FROM `porduct` WHERE `ID`='$pid'";
        $re=mysqli_query($conn,$s);
        $ro=mysqli_fetch_assoc($re);
        $qid=$row['questionID'];
        $ree="SELECT * FROM `qu` WHERE `ID`='$qid'";
        $ress=mysqli_query($conn,$ree);
        $roww=mysqli_fetch_assoc($ress);
        $list[$i]=array(
            "brand"=>$ro['pinpai'],
            "papertype"=>$ro['type'],
            "level"=>$ro['jibie'],
            "g"=>$ro['kezhong'],
            "specifications"=>$ro['guige'],
            "dinghuo"=>$row['weight'],
            "jianno"=>$row['jh'],
            "problem"=>$roww['name'],
            "lostweight"=>$ro['lowestsave'],
            "caino"=>$row['buyID'],
            "intime"=>$row['time'],
            "inno"=>$row['inputID'],
            "lost"=>$row['lost']
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