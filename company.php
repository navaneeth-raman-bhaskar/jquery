<link type="text/css" href="boot3/css/bootstrap.css" rel="stylesheet">

<table class="table table-striped">
    <th>Company-Name</th>
    <th>Type</th>



    <?php
$connect=mysqli_connect("localhost","root","root","job");
$query="select * from company";
$output=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($output))
{
    echo '<tr>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['type'].'</td>';
    echo "<td><a href=joblist.php?cid=".$row['cid'].">Available jobs</a></td>";
    echo '</tr>';
} 
 ?>
</table>
