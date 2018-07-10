<?php
session_start();
$id=$_SESSION['id'];
$jid=$_GET['id'];
$connect=mysqli_connect("localhost","root","","job");
$query="delete from jobs where jobid=$jid";
$output=mysqli_query($connect,$query);
header("location:comdetails.php");
?>
