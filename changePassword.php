<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2017/5/27
 * Time: 15:37
 */
session_start();
include("conn.php");
if($_POST['密码']!=$_POST['新密码'])
{
    echo "<script>alert('输入的两次密码不同，请重新输入！');history.go(-1);</script>";
}
else {
    $pas = $_POST['密码'];
        $pno = $_SESSION['账号'];
        $sql = "update employee set password='$pas' WHERE ID='$pno'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "<script>alert('修改失败！');history.go(-1);</script>";
        }
        else
        {
            echo "<script>alert('修改成功！');
 window.location.href='login.html';</script>";
        }
}