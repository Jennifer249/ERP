
<!--18:46:16-->
<!--软三廖航英 2018-01-08 18:46:16-->
<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/1/5
 * Time: 18:55
 */


include"conn.php";
session_start();
$id = $_SESSION['ID'];
$sqlll = "SELECT * FROM `employee` WHERE `ID` = '$id'";
$r = mysqli_query($conn, $sqlll);
$row=mysqli_fetch_assoc($r);
if($row['flag']==1)
{
    $name = $_POST['name'];
    $add = $_POST['address'];
    $tele = $_POST['telephone'];
    $fax = $_POST['fax'];
    $zipcode = $_POST['zipcode'];
    header("Content-type: textml; charset=utf-8");


//$exec = "INSERT INTO `company`(`name`, `address`, `tele`, `fax`, `zipcode`) VALUES ('$name','$add','$tele','$fax','$zipcode')";
//$result = mysqli_query($conn,$exec);
    $exec = "UPDATE `company`
SET `name`='$name',`address`='$add',`tele`='$tele',`fax`='$fax',`zipcode`='$zipcode' WHERE 1";
    $result = mysqli_query($conn, $exec);

    if ($result) {
        echo "<script>alert('success');
window.location.href='system.html'
   </script>";
    } else {
        echo "<script>alert('$name');
    window.location.href='system.html';</script>";
    }
}
else
{
    echo "<script>alert('没有权限');
    window.location.href='system.html';</script>";
}

//mysqli_close();
?>
