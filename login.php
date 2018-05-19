<?php
             $username =$_POST['账号'];
             $psw=$_POST['密码'];
             $style=$_POST['类型'];
  //验证是否存在

           include("conn.php");
              if($style=='female')
              {
                  if($username=="")
                  {
                      echo "<script>alert('账号不能为空!');history.go(-1);</script>";
                  }
                  else if($psw=="")
                  {
                      echo "<script>alert('密码不能为空！');history.go(-1);</script>";
                  }
                  $query = mysqli_query($conn,"select * from employee where    ID= '$username' and password='$psw'AND flag=1");
                  $result=mysqli_num_rows( $query);
                  if($result)
                  {
                      session_start();
                      $_SESSION['ID']=$username;
                      echo "<script>alert('登录成功');
                        window.location.href='main.html';</script>";
                  }
                  else {
                      echo "<script>alert('您输入的用户名或者密码不正确');
                      history.go(-1);</script>";
                  }
              }
              else {
                  $query = mysqli_query($conn,"select * from employee where ID= '$username' and password='$psw'and flag=0");
                  $result=mysqli_num_rows($query);
                  if ($result>0) {
                      session_start();
                      $_SESSION['ID'] = $username;
                      echo "<script>alert('登录成功');
                                            window.location.href='main.html';</script>";
                  } else {
                       echo "<script>alert('您输入的用户名或者密码不正确');history.go(-1);</script>";

                  }
              }
?>