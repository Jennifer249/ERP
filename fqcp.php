<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/1/8
 * Time: 0:53
 */
//outno'+"productID'="num''"weight'="price'+="customerID' employeeID'total'<td> jh;
include("conn.php");
//session_start();
$wd = '吨';
$nd = '张';
if($_SERVER['REQUEST_METHOD']=="POST") {
//    $employeeID=$_SESSION['ID'];
    $outid=$_POST['outno'];
//    $productID=$_POST['productID'];
//    $num=$_POST['num'];
//    $weight=$_POST['weight'];
//    $price=$_POST['price'];
//    $customerID=$_POST['customerID'];
//    $employeeeID=$_POST['employeeID'];
//    $total=$_POST['total'];
    $time = $_POST['ordertime'];
    $number = count($_POST);//post的总数
    $count = $number / 9;
    for ($i = 1; $i <= $count; $i++) {
        $ii = "{$i}";
        $outno = "outno" . "{$i}";//品牌
        $pid = "productID" . "{$i}";//纸种
        $num = "num" . "{$i}";//级别
        $weight = "weight" . "{$i}";//克重
        $price = "price" . "{$i}";//规格
        $cid = "customerID" . "{$i}";//出厂价
        $eid = "employeeID" . "{$i}";//运费
        $total = "total" . "{$i}";//总价
        $jh = "jh" . "{$i}";//标准售价

        //$ban=$_POST['band1'];
        $arr[$i] = array(
            "outno" => $_POST[$outno],
            "productID" => $_POST[$pid],
            "num" => $_POST[$num],
            "weight" => $_POST[$weight],
            "price" => $_POST[$price],
            "customerID" => $_POST[$cid],
            "employeeID" => $_POST[$eid],
            "total" => $_POST[$total],
            "jh" => $_POST[$jh],

        );
    }
    $ssql="SELECT * FROM `output` WHERE `ID`='$outid'";
    $re=mysqli_query($conn,$ssql);
    $roww=mysqli_fetch_assoc($re);
    $saleid=$roww['saleID'];//供应商id
//    $flag=0;
//    for($j=1;$j<=$count;$j++)
//    {
//        $a=$arr[$j]['band'];
//        $b=$arr[$j]['papertype'];
//        $c=$arr[$j]['level'];
//        $d=$arr[$j]['weight'];
//        $e=$arr[$j]['format'];
//        $sql="SELECT * FROM `porduct` WHERE `pinpai`='$a'AND `type`='$b'AND `jibie`='$c'AND `kezhong`='$d' AND `guige`='$e'";
//        $result=mysqli_query($conn,$sql);
//        $row=mysqli_fetch_assoc($result);
//        $arrr[$j]=array(
//            'ID'=>$row['ID'],
//            'we'=>$row['weightd']
//        );
//        $idd[$j]=$row['ID'];//获取商品的ID
//        $we[$j]=$row['weightd'];
//        $iid=$row['ID'];
//        $sqql="SELECT * FROM `provideproduct` WHERE `provideID`='$pid'AND `productID`='$iid'";
//        $res=mysqli_query($conn,$sqql);
//        $roow=mysqli_num_rows($res);
//        if($roow<=0)
//        {
//        }
//        else
//        {
//            $flag++;
//        }
//    }
//    if ($flag == $count) {
        for ($t = 1; $t <= $count; $t++) {
            $a = $arr[$t]['outno'];
            $b = $arr[$t]['productID'];
            $c = $arr[$t]['num'];
            $d = $arr[$t]['weight'];
            $e = $arr[$t]['price'];
            $f = $arr[$t]['customerID'];
            $g = $arr[$t]['employeeID'];
            $h = $arr[$t]['total'];
            $i = $arr[$t]['jh'];
            $sqli = "INSERT INTO `fqoutput`(`ID`, `productID`, `weightd`, `numd`, `outputweight`, `outnum`, `price`,
`sum`, `jh`, `saleID`, `time`, `employeeID`, `bz`) VALUES ('$a','$b','$wd','$nd',
'$d','$c','$e','$h','$i','0','$time','$g','0')";
            $resulti = mysqli_query($conn, $sqli);
            if (!$resulti) {
                //插入失败
                $data = array(
                    "success" => false,
                    "count" => '失败'
                );
            } else {
                $data = array(
                    "success" => true,
                    //"count"=>$count
                );
            }
        }
//    }
//    else
//    {
//        $data=array(
//            "success"=>false,
//            "count"=>$count
//        );
//    }
        echo json_encode($data);
//    }
}
//else if($_SERVER['REQUEST_METHOD']=="GET")
//{
//    $btime=$_GET['beginTime'];
//    $etime=$_GET['endTime'];
//    $ssql="SELECT * FROM `buy` WHERE `time`>='$btime'AND `time`<='$etime'";
//    $r=mysqli_query($conn,$ssql);
//    $i=0;
//    while($re=mysqli_fetch_assoc($r))
//    {
//        $providerID=$re['providerID'];
//        $s="SELECT * FROM `provider` WHERE `ID`='$providerID'";
//        $rr=mysqli_query($conn,$s);
//        $ree=mysqli_fetch_assoc($rr);
//        $namm=$ree['name'];
//        $list[$i]=array(
//            "supplier"=>$namm,
//            "orderno"=>$re['hetong'],
//            "contracttime"=>$re['time']
//        );
//        $i++;
//    }
//    if($i==0)
//    {
//        $data=array(
//            "success"=>false
//        );
//    }
//    else
//    {
//        $data=array(
//            "success"=>true,
//            "list"=>$list
//        );
//    }
//    echo json_encode($data);
//}
