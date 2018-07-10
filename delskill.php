<?php
session_start();
$skill=$_GET['remove'];
$id=$_SESSION['id'];
$connect=mysqli_connect("localhost","root","","job");
$query="delete from skills where skill='$skill' and logid=$id";
$output=mysqli_query($connect,$query);
?>
