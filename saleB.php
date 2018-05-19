<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2018-01-07
 * Time: 12:47
 */
include("conn.php");
    $ordernum=$_GET['orderno'];
    $sql="DELETE  FROM `sale` WHERE `ID`='$ordernum'";
    $result=mysqli_query($conn,$sql);
    if(!$result)
    {
        $datav=array(
            "success"=>false,
            "ordern"=>$ordernum
        );
    }
    else
    {
        $datav=array(
            "success"=>true,
            "ordern"=>$ordernum
        );
    }
    echo json_encode($datav);
