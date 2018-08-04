<?php
session_start();
if (isset($_SESSION['id']))
{
    if ($_SESSION['type']=='company')
    {
$clogid=$_SESSION['id'];
$connect=mysqli_connect("localhost","root","root","job");
$query="select student.name,student.logid,jobs.title,email from applied inner join  jobs on applied.jobid = jobs.jobid inner join student on applied.logid = student.logid inner join credential on student.logid=credential.logid where jobs.logid=$clogid;";
$output=mysqli_query($connect,$query);
?>
    <link type="text/css" href="boot3/css/bootstrap.css" rel="stylesheet">

    <table class="table table-striped">
        <th>Stud Name</th>
        <th>Email</th>
        <th>Student ID</th>
        <th>Job Title</th>
        <?php
while($row=mysqli_fetch_array($output))
{
    echo '<tr>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td>'.$row['logid'].'</td>';
    echo '<td>'.$row['title'].'</td>';
    echo "<td><a href=account.php?sid=".$row['logid']."&em=".$row['email'].">Show profile</a></td>";
    echo '</tr>';

}
}
    else echo 'ACCESS DENIED';
}
else echo 'Not Logged in';

?>
    </table>
