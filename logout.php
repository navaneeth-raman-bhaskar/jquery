<?php
session_start();
if (isset($_SESSION['id']))
{
$id=$_SESSION['id'];
$connect=mysqli_connect("localhost","root","","job");
$query="update status set online=0 where logid=$id";
$output=mysqli_query($connect,$query);
session_destroy();
}
header("location:layout.php");
?>
