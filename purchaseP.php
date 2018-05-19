<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2018-01-07
 * Time: 13:34
 */
include("conn.php");
$ordernum=$_GET['orderno'];//框架合同号
$sql="DELETE FROM `buy` WHERE `hetong`='$ordernum'";
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
