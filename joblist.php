<style>
    .nv {
        color: yellow;
    }

    .v {
        color: green;
    }

    .sp {
        color: red;
    }

</style>


<?php
session_start();
if (isset($_GET['cid']))
{
    $cid=$_GET['cid'];
    $cond="cid=".$cid;
}
elseif(isset($_GET['str']))
{
    $sort=$_GET['str'];
    $cond= "name like '%$sort%' or title like '%$sort%' or skillset like '%$sort%' or description like '%$sort%' ";
    
}
else
    $cond=1;
?>
    <link type="text/css" href="../PHP/boot3/css/bootstrap.css" rel="stylesheet">
    <table class="table table-striped">
        <th>Title</th>
        <th>Provided company</th>
        <th>Verification</th>
        <th>Description</th>
        <th>Salary (PA)</th>
        <th>Expiring date</th>
        <th>Skills required</th>
        <?php
        
$connect=mysqli_connect("localhost","root","","job");
$query="select * from jobs inner join company on jobs.logid=company.logid inner join credential on credential.logid=company.logid where $cond";
$output=mysqli_query($connect,$query);
       
while($row=mysqli_fetch_array($output))
{
    echo '<tr>';
    echo '<td>'.$row['title'].'</td>';
    echo '<td>'.$row['name'].'</td>';
    
    if($row['status']==0)
    echo '<td class="nv"><span class="glyphicon glyphicon-question-sign"></span>Pending </td>';
    elseif($row['status']==1)
    echo '<td class="v"><span class="glyphicon glyphicon-ok-sign"></span>Verified</td>';
    elseif($row['status']==2)
    echo '<td class="sp"><span class="glyphicon glyphicon-remove-sign"></span>Spam</td>';
    
    
    echo '<td>'.$row['description'].'</td>';
    echo '<td>'.$row['salary'].'</td>';
    echo '<td>'.$row['closedate'].'</td>';
    echo '<td>'.$row['skillset'].'</td>';
    if (isset($_SESSION['type']))
    {
    if ($_SESSION['type']=='student' && $row['status']=='1')
    {
     echo '<td><a href=apply.php?jid='.$row["jobid"].'>Apply</a></td>';
    }
    }
     echo '</tr>';
}

?>
    </table>.
