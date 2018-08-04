<?php
session_start();
if(isset($_SESSION['id']))
{
if ($_SESSION['type']=='student')
{
$id=$_SESSION['id'];
$jid=$_GET['jid'];
$connect=mysqli_connect("localhost","root","root","job");
$query="insert into applied values($jid,$id)";
$output=mysqli_query($connect,$query);

echo '<h2>Successfully Applied</h2>';
    header("refresh:2;appliedjob.php");
} else echo 'ACCESS DENIED';
}else echo 'Not logged in';
?>
