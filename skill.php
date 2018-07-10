<?php
session_start();
$skill=$_GET['skill'];
$id=$_SESSION['id'];
$connect=mysqli_connect("localhost","root","","job");
if ($skill)
{
$query="insert into skills values('$skill',$id)";
$output=mysqli_query($connect,$query);
}
 $query="select * from skills where logid=$id";
$output=mysqli_query($connect,$query);
            while($row=mysqli_fetch_array($output))
                    {
                        echo '<tr class="delete">';
                        echo '<td>'.$row['skill'].'</td>';
                        echo '<td style="visibility:visible;" class="close">&times;</td>';
                        echo '</tr>';
                    }

?>
