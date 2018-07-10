<?php
session_start();
$id=$_SESSION['id'];
$t=$_SESSION['type'];
?>
<link type="text/css" href="../PHP/boot3/css/bootstrap.css" rel="stylesheet">
<table class="table">
    <th>JobID</th>
    <th>Title</th>
    <th>Provided Company</th>

    <?php
$connect=mysqli_connect("localhost","root","","job");
$query="SELECT * from jobs INNER JOIN applied ON jobs.jobid=applied.jobid INNER JOIN company ON jobs.logid=company.logid WHERE applied.logid=$id";
$output=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($output))
{
    echo '<tr>';
    echo '<td>'.$row['jobid'].'</td>';
    echo '<td>'.$row['title'].'</td>';
    echo '<td>'.$row['name'].'</td>';
  if($t=='student'){
       echo '<td><a href=cancel.php?jid='.$row["jobid"].'>cancel</a>
        </td>'; 
  }
    echo '</tr>';
} ?>
