<?php
/**
 * Created by PhpStorm.
 * User: 洪祺瑜
 * Date: 2017/5/25
 * Time: 21:08
 */
header("Content-type: text/html; charset=utf-8");
if($_POST['question1']==$_POST['question2'])
{
    echo "<script>alert('问题不可以一样！');history.go(-1);</script>";
}
else
{
    include("conn.php");

    $no=$_POST['账号'];
    $sql="select * from employee where ID='$no'";
    $result=mysqli_query($conn,$sql);
    if(!$result)
    {
        echo "<script>alert('没有该账号！');history.go(-1);</script>";
    }
    $roo = mysqli_fetch_assoc($result);
    if(($_POST['question1']==$roo['question1']&&$_POST['answer1']==$roo['answer1'])||($_POST['question2']==$roo['question1']&&$_POST['answer2']==$roo['answer1']))
    {
        if(($_POST['question1']==$roo['question2']&&$_POST['answer1']==$roo['answer2'])||($_POST['question2']==$roo['question2']&&$_POST['answer2']==$roo['answer2']))
        {
                session_start();
                $_SESSION['账号']=$no;
                echo "<script>alert('回答正确！');
                window.location.href='changePassword.html';</script>";
        }
        else
        {
            echo "<script>alert('问题与答案不一致！');history.go(-1);</script>";
        }
    }
    else
    {
        echo "<script>alert('问题与答案不一致！');history.go(-1);</script>";
    }
}
