<?php
session_start();
if(isset($_SESSION['id']))
{
if ($_SESSION['type']=='student')
{
$id=$_SESSION['id'];
$jid=$_GET['jid'];
$connect=mysqli_connect("localhost","root","","job");
$query="delete from applied where jobid=$jid";
$output=mysqli_query($connect,$query);
    echo '<h2>Job Cancelled</h2>';
    header("refresh:2;appliedjob.php");
} else echo 'ACCESS DENIED';
}else echo 'Not logged in';
?>
