<?php
session_start();
if(isset($_SESSION['id']))
{
if ($_SESSION['type']=='student')
{
$skill=$_GET['remove'];
$id=$_SESSION['id'];
$connect=mysqli_connect("localhost","root","root","job");
$query="delete from skills where skill='$skill' and logid=$id";
$output=mysqli_query($connect,$query);
}else echo 'ACCESS DENIED';
}else echo 'Not Logged In';
?>
