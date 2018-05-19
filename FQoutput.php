<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/1/5
 * Time: 12:28
 */
$sale = $_GET['map'];
include("conn.php");

//$sql="select * from `sale` where `ID`='$sale'";
//$result=mysqli_query($conn,$sql);
//$rrrr=mysqli_num_rows($result);
//$i = '0';
//
//
//$p = "p7".$i;
//    if ($rrrr > 0) {
//        $row = mysqli_fetch_assoc($result);
//        $arr = array(
//            "success" => true,
//            //"p1"+'$i' => $row['ID'],
//            $p => $row['num'],
//           // "p3"+'$i' => $row['weight'],
//           // "p4"+$i => $row['aboutm'],
////             "p5"+$i => $row['nick'],
////            "p6"+$i => $row['sex'],
////            "p7"+$i => $row['city'],
////            "p8"+$i => $row['aboutme'],
////          "p9"+$i => $row['nick'],
////            "p10"+$i => $row['sex'],
////            "p11"+$i => $row['city']
//
//
//        );
//
//    } else {
//        $arr = array(
//            "success" => false
//        );
//    }
$arr = array(
            "success" => true
        );
    echo json_encode($arr);
//    $i = i-1;

