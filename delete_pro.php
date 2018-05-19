<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Content-type:text/html;charset=utf-8");

include("conn.php");

$delete=$_POST['deleteno'];//供应商ID
$sqll="DELETE FROM `provider` WHERE `ID`='$delete'";
$result1=mysqli_query($conn,$sqll);
if(!$result1)
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
?>