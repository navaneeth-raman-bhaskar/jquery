<?php
session_start();
$comp=$_GET['comp'];
$pos=$_GET['pos'];
$id=$_SESSION['id'];
$connect=mysqli_connect("localhost","root","","job");
$query="delete from experience where company='$comp' and position='$pos' and logid=$id";
$output=mysqli_query($connect,$query);
?>
