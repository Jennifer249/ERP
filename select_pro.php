<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Content-type:text/html;charset=utf-8");

include("conn.php");
$select=$_GET["deletetext"];

$sql="SELECT * FROM `provider` WHERE name='$select'";
$result=mysqli_query($conn,$sql);
$i=0;
while($row=mysqli_fetch_assoc($result)){
    $list[$i]=array(
        "id"=>$row['ID'],
        "supplier"=>$row['name'],
        "address"=>$row['address'],
        "cardno"=>$row['bank'],
        "phone"=>$row['tele']
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


?>