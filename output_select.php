<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Content-type:text/html;charset=utf-8");

include("conn.php");
$productID="0";
$select=$_GET["corderno"];
$brand="0";
$pinpai="0";
$jibie="0";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $sql="SELECT * FROM `output` WHERE ID='$select'";
    $result=mysqli_query($conn,$sql);
    $i=0;
    $sql2="SELECT `productID` FROM `output` WHERE ID='$select'";
    $productID1 = $conn->query($sql2);
    while($row2=mysqli_fetch_assoc($productID1)){
        $productID=$row2[0];
    }
    // $roo=mysqli_fetch_assoc($rees);
    $sql3="SELECT * FROM `porduct` WHERE ID=$productID";
    $pro=mysqli_query($conn,$sql3);
    //SELECT `ID`, `pinpai`, `type`, `jibie`, `kezhong`, `guige`, `price`, `weightd`, `numd`, `number`, `bzprice`, `yhprice`, `lowestsave`, `highestsave` FROM `porduct` WHERE 1
    while($row3=mysqli_fetch_assoc($pro)){
        $pinpai=$row3['pinpai'];
        $type=$row3['type'];
    }
    $i=0;
    while($row2=mysqli_fetch_array($productID1)){
        $list[$i]=array(
            "brand"=>$row2['pinpai'],
            "papertype"=>$row2['type'],
            "level"=>$row2['jibie'],
            "g"=>$row2['kezhong'],
            "specifications"=>$row2['guige'],
            "zunit"=>$row2['weightd'],
            "sunit"=>$row2['numd'],
            "price"=>$row2['price'],
        );$i++;

    }

    while($row=mysqli_fetch_assoc($result)){
        $list[$j]=array(
            "brand"=>$row['pinpai'],
            "papertype"=>$row['type'],
            "level"=>$row['jibie'],
            "g"=>$row2['kezhong'],
            "specifications"=>$row['guige'],
            "zunit"=>$row['weightd'],
            "sunit"=>$row['numd'],
            "price"=>$row['price'],

            //SELECT `ID`, `productID`, `weightd`, `numd`, `outputweight`, `outnum`, `price`, `sum`, `jh`, `saleID`, `time`, `employeeID` FROM `output` WHERE 1
            //SELECT `ID`, `pinpai`, `type`, `jibie`, `kezhong`, `guige`, `price`, `weightd`, `numd`, `number`, `bzprice`, `yhprice`, `lowestsave`, `highestsave` FROM `porduct` WHERE 1

            "putsto"=>$row['outputweight'],
            "putnum"=>$row['outnum'],

            "jianno"=>$row['jh'],
            "custoname"=>"客户",
            "puttime"=>$row['time'],
            "saleno"=>$row['saleID'],
            "putno"=>$row['ID'],
            "people"=>$row['employeeID'],
            "sum"=>$row['sum']
        );
        $j++;
    }


    $j=0;

    if($i==0&&$j==0)
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
else{
    $delete=$_POST['deleteno'];//供应商ID
    $sqll="DELETE FROM `customer` WHERE `ID`='$delete'";
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
}


?>
