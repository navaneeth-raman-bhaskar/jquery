<?php
session_start();
$id=$_SESSION['id'];
$jid=$_GET['jid'];
$connect=mysqli_connect("localhost","root","","job");
$query="insert into applied values($jid,$id)";
$output=mysqli_query($connect,$query);

echo '<h2>Successfully Applied</h2>';

?>
