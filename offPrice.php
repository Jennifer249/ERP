<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2018-01-07
 * Time: 9:16
 */
include("conn.php");
session_start();
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $orderno=$_POST['orderno'];//订单号
    $sql="SELECT * FROM `special` WHERE `ID`='$orderno'";
    $result=mysqli_query($conn,$sql);
    $i=0;
    $sqq="SELECT * FROM `sale` WHERE `ID`='$orderno'";
    $ree=mysqli_query($conn,$sqq);
    $www=mysqli_fetch_assoc($ree);//查销售表
    $employee=$www['employeeID'];
    $customer=$www['customerID'];
    $sqqq="SELECT * FROM `employee` WHERE `ID`='$employee'";
    $ssqq="SELECT * FROM `customer` WHERE `ID`='$customer'";
    $reew=mysqli_query($conn,$sqqq);
    $rree=mysqli_query($conn,$ssqq);
    $rowww=mysqli_fetch_assoc($reew);
    $rrow=mysqli_fetch_assoc($rree);
    $cname=$rrow['name'];
    $ename=$rowww['name'];
//    $rooww=mysqli_fetch_assoc($ree);
    while($row=mysqli_fetch_assoc($result))
    {
        $prid=$row['productID'];
        $price=$row['price'];
        $sqll="SELECT * FROM `porduct` WHERE `ID`='$prid'";
        $re=mysqli_query($conn,$sqll);
        $roww=mysqli_fetch_assoc($re);
        $list[$i]=array(
            "brand"=>$roww['pinpai'],
            "papertype"=>$roww['type'],
            "level"=>$roww['jibie'],
            "g"=>$roww['kezhong'],
            "specifications"=>$roww['guige'],
            "unit"=>$roww['weightd'],
            "price"=>$price
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
            "orderno"=>$orderno,
            "saler"=>$ename,
            "customername"=>$cname,
            "ordertime"=>$www['time']
        );
    }
    echo json_encode($data);
}
else if($_SERVER['REQUEST_METHOD']=="GET")
{
   $btime=$_GET['beginTime'];
    $etime=$_GET['endTime'];
    $sqlll="SELECT * FROM `sale` WHERE `time`>='$btime'AND `time`<='$etime'";
    $answer=mysqli_query($conn,$sqlll);
    $i=0;
   while( $rrrr=mysqli_fetch_assoc($answer))
   {
       $o=$rrrr['ID'];
       $s="SELECT * FROM `special` WHERE `ID`='$o'";
       $a=mysqli_query($conn,$s);
       $ro=mysqli_fetch_assoc($a);
       $no=$rrrr['customerID'];
       $em=$rrrr['employeeID'];
       $ss="SELECT * FROM `customer` WHERE `ID`='$no'";
       $an=mysqli_query($conn,$ss);
       $roo=mysqli_fetch_assoc($an);
       $sss="SELECT * FROM `employee` WHERE `ID`='$em'";
       $ann=mysqli_query($conn,$sss);
       $rw=mysqli_fetch_assoc($ann);
       $list[$i]=array(
           "orderno"=>$rrrr['ID'],
           "customer"=>$roo['name'],
           "saler"=>$rw['name']
       );
       $i++;
   }
    if($i==0)
    {
        $dataa=array(
            "success"=>false
        );
    }
    else
    {
        $dataa=array(
          "success"=>true,
            "list"=>$list
        );
    }
    echo json_encode($dataa);
}