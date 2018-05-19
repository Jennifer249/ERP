<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/24 0024
 * Time: 8:03
 */header("Content-type: text/html; charset=utf-8");
$conn= mysqli_connect('localhost','root','','erp')or die('连接失败'.mysqli_errno());
$conn->query("SET NAMES utf8");
if( $conn)
echo" ";
else
   echo('数据库连接失败'.mysali_errno());

?>


