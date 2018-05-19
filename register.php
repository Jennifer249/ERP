<?php
header("Content-type: text/html; charset=utf-8");
  if (!isset($_POST['注册'])){exit('非法闯入！');}
     $pn = $_POST['ID'];
     $psw = $_POST['password'];
     $psw2 = $_POST['password2'];
      $q1 = $_POST['question1'];
      $a1 = $_POST['answer1'];
      $q2 = $_POST['question2'];
      $a2 = $_POST['answer2'];
$flag=0;
//两次密码一致
if ($pn == ""||$psw==""||$psw2==""||$psw2==""|| $q1==""||$a1==""|| $q2==""|| $a2=="")
{
    echo "<script>alert('信息填写不完整！');history.go(-1);</script>";
}
else
{
    if($psw!=$psw2)
    {
        echo"<script>alert('两次密码不一样，请重新输入！');history.go(-1);</script>";
    }
    else if($q1==$q2)
    {
        echo"<script>alert('密保问题不能一样，请重新输入！');history.go(-1);</script>";
    }
    else if(strlen($pn)>20)
    {
        echo"<script>alert('账户超过20个字符，请重新输入！');history.go(-1);</script>";
    }
    else if(strlen($psw)>20||strlen($psw2)>20)
    {
        echo"<script>alert('密码超过20个字符，请重新输入！');history.go(-1);</script>";
    }
    else//连接数据库，账号是否已经存在
    {
        include("conn.php");
        $sql= "select * from employee where ID='$pn' ";
        $r=mysqli_query($conn,$sql);
        $result=mysqli_num_rows( $r);
        if($result>0)
        {
            echo"<script>alert('账号已存在，请重新输入！');history.go(-1);</script>";
        }
        else
        {
            $sqli = "INSERT INTO `employee`(`ID`, `name`, `password`, `tele`, `zw`, `question1`, `question2`, `answer1`, `answer2`, `flag`) VALUES
('$pn','','$psw','','','$q1','$q2','$a1','$a2','$flag')";
                $resulti = mysqli_query($conn,$sqli);
                if (!$resulti)
                {
                    echo "<script>alert('注册失败！');history.go(-1);</script>";
                }
                else
                {
                    echo "<script>alert('注册成功');
                                            window.location.href='login.html';</script>";
                }
        }
    }
}


?>

