<?php
session_start();
if(isset($_SESSION['id']))
{
if ($_SESSION['type']=='student')
{
$comp=$_GET['comp'];
$pos=$_GET['pos'];
$id=$_SESSION['id'];
$connect=mysqli_connect("localhost","root","","job");
$query="delete from experience where company='$comp' and position='$pos' and logid=$id";
$output=mysqli_query($connect,$query);
}else echo 'ACCESS DENIED';
}else echo 'Not Logged In';

?>
