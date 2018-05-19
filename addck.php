<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/1/8
 * Time: 11:28
 */
include"conn.php";
//$na =$_POST['name'];
//$id=$_POST['number'];
$number = count($_POST);//post的总数
$count = $number / 2;

for ($i = 1; $i <= $count; $i++) {
    $ii = "{$i}";
    $no = "storeno" . "{$i}";
    $name = "name" . "{$i}";

    $arr[$i] = array(
        "storeno" => $_POST[$no],
        "name" => $_POST[$name]);

    for ($t = 1; $t <= $count; $t++) {
        $a = $arr[$t]['storeno'];
        $b = $arr[$t]['name'];


        $exec = "INSERT INTO `storehouse`(`ID`, `name`) VALUES ('$a','$b')";
        $result = mysqli_query($conn, $exec);
        if(!$result){
            $data = array(
                "success" => false,
            );
        } else {
            $data = array(
                "success" => true,
            );
        }
    }
}
echo json_encode($data);

?>