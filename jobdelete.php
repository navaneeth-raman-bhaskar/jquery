<?php
session_start();
if(isset($_SESSION['id']))
{
if ($_SESSION['type']=='company')
{
$id=$_SESSION['id'];
$jid=$_GET['id'];
$connect=mysqli_connect("localhost","root","root","job");
$query="delete from jobs where jobid=$jid";
$output=mysqli_query($connect,$query);
}
}
header("location:comdetails.php");
?>
