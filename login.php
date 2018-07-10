<?php
session_start();
$uname=$_POST['username'];
$pass=$_POST['password'];
$connect=mysqli_connect("localhost","root","","job");
    $query="select logid from credential where email='$uname' and password='$pass'";
    $output=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($output);
    $id=$row['logid'];

if ($id>0)
{
if (isset($_POST['remem']))
{
    $time=time()+3600;
    setcookie('u',$uname,$time);
    setcookie('p',$pass,$time);
}
elseif(!isset($_POST['remem']))
{
    $time=time()-1;
    setcookie('u',$uname,$time);
    setcookie('p',$pass,$time);
}
$_SESSION['user']=$uname;
$_SESSION['id']=$id;
$query="select type from credential where logid=$id";
$output=mysqli_query($connect,$query);
$row=mysqli_fetch_array($output);
$type=$row['type'];
$_SESSION['type']=$type; 
$query="update status set online=1 where logid=$id";
$output=mysqli_query($connect,$query);
}
header("location:layout.php");
?>
