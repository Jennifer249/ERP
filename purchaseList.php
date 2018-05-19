<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2018-01-06
 * Time: 15:51
 */
include("conn.php");
session_start();
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $re=true;
    $datt=true;
    $name=$_POST['name'];//卖方，供应商名称
    $number=$_POST['numbern'];//合同号
    $orderno=$_POST['orderno'];//采购单号
    $ordertime=$_POST['ordertime'];//订货时间
    $numberr=$_POST['numberr'];//第二个合同号
    $tel=$_POST['tel'];//供应商的电话号码
    $address=$_POST['address'];
    $sqll="SELECT * FROM `provider` WHERE `name`='$name'";
    $ree=mysqli_query($conn,$sqll);
    $rr=mysqli_fetch_assoc($ree);
    $providerID=$rr['ID'];
    $num=count($_POST);
    $count=($num-10)/10;
    if($number!=$numberr)
    {
        $datt=false;
    }
    else
    {
        $flag=0;
        $fflag=0;
        for($i=1;$i<=$count;$i++)//获取每一列的数据
        {
            $band="band"."{$i}";//品牌
            $pap="papertype"."{$i}";//纸种
            $level="level"."{$i}";//级别
            $weight="weight"."{$i}";//克重
            $format="format"."{$i}";//规格
            $weightd="ssum"."{$i}";//重量单位
            $sl="jian"."{$i}";//数量
            $jian="symble"."{$i}";//件数
            $account="sumaccount"."{$i}";//单价
            $sum="allsum"."{$i}";//总价
            $arr[$i]=array(
                "band"=>$_POST[$band],
                "pap"=>$_POST[$pap],
                "level"=>$_POST[$level],
                "weight"=>$_POST[$weight],
                "format"=>$_POST[$format],
                "weightd"=>$_POST[$weightd],
                "sl"=>$_POST[$sl],
                "jian"=>$_POST[$jian],
                "account"=>$_POST[$account],
                "sum"=>$_POST[$sum]
            );
            $a=$arr[$i]["account"];
            $b=$arr[$i]["jian"];
            $c=$arr[$i]["sum"];
            if($a*$b!=$c)//如果单价乘以件数不等于总价
            {
                $datt=false;
            }
            $pp=$arr[$i]["band"];
            $paap=$arr[$i]["pap"];
            $llevel=$arr[$i]["level"];
            $weightt=$arr[$i]["weight"];
            $formatt=$arr[$i]["format"];
            $sql="SELECT * FROM `porduct` WHERE `pinpai`='$pp' AND `type`='$paap' AND `jibie`='$llevel' AND `kezhong`='$weightt'AND `guige`='$formatt'";
            $result=mysqli_query($conn,$sql);//判断这些纸种是否存在
            $r=mysqli_fetch_assoc($result);
            $arr[$i]['productID']=$r['ID'];
            $a=$r['ID'];
            if(!$result)
            {

            }
            else
            {
                $flag++;
            }
            $ssql="SELECT * FROM `buy` WHERE `hetong`='$number'AND `productID`='$a'AND `providerID`='$providerID'";
            $resul=mysqli_query($conn,$ssql);//制定采购计划的时候是否有这一条
            if(!$resul)
            {

            }
            else
            {
                $fflag++;
            }
        }
        if($flag!=$count||$fflag!=$count)//如果传入的数据不符合
        {
            $datt=false;
        }
        else
        {
            for($j=1;$j<=$count;$j++)
            {
                $wed=$arr[$j]['weightd'];
                $we=$arr[$j]['sl'];
                $jia=$arr[$j]['jian'];
                $acc=$arr[$j]['account'];
                $su=$arr[$j]['sum'];
                $prd=$arr[$j]['productID'];
                $ssqq="SELECT * FROM `porduct` WHERE`ID`='$prd'";
                $rre=mysqli_query($conn,$ssqq);
                $rro=mysqli_fetch_assoc($rre);
                if(($jia<($rro['lowestsave']-$rro['number']))||($jia>($rro['highestsave']-$rro['number'])))
                {
                    $datt=false;
                }
                $sqql="UPDATE `buy` SET `ID`='$orderno',`weightd`='$wed',
`weight`='$we',`num`='$jia',`price`='$acc',`sum`='$su',`time`='$ordertime'
 WHERE `productID`='$prd'AND `hetong`='$number'";
               $res=mysqli_query($conn,$sqql);
                if(!$res)
                {
                    $datt=false;
                }
                else
                {
                    $datt=true;
                }
            }
        }
   }
    $dataa=array(
      "success"=>$datt
    );
    echo json_encode($dataa);
}
else if($_SERVER['REQUEST_METHOD']=="GET")
{
    $btime=$_GET['beginTime'];
    $etime=$_GET['endTime'];
    $ssql="SELECT * FROM `buy` WHERE `time`>='$btime'AND `time`<='$etime'";
    $r=mysqli_query($conn,$ssql);
    $i=0;
    while($re=mysqli_fetch_assoc($r))
    {
        $list[$i]=array(
            "ordertime"=>$re['time'],
            "orderno"=>$re['ID']
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