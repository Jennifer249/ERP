<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2018-01-07
 * Time: 13:48
 */
include("conn.php");
$ordernum=$_GET['orderno'];//采购单号
$sql="DELETE FROM `buy` WHERE `ID`='$ordernum'";
$result=mysqli_query($conn,$sql);
if(!$result)
{
    $data=array(
        "success"=>false
    );
}
else
{
    $data=array(
        "success"=>true
    );
}
echo json_encode($data);
