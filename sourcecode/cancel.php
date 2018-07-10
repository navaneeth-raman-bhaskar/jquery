<?php
session_start();
$id=$_SESSION['id'];
$jid=$_GET['jid'];
$connect=mysqli_connect("localhost","root","","job");
$query="delete from applied where jobid=$jid";
$output=mysqli_query($connect,$query); ?>
