<?php
$logid=$_GET['id'];
$operation=$_GET['oper'];
$connect=mysqli_connect("localhost","root","root","job");
if ($operation==0)
{
$query="delete from credential where logid=$logid";
}
elseif ($operation==1)
{
$query="update credential set status=1 where logid=$logid";
}
elseif ($operation==2)
{
$query="update credential set status=2 where logid=$logid";
}

$output=mysqli_query($connect,$query);
 $query="select credential.logid,email,credential.type,student.name as sname,company.name as cname,status from credential LEFT OUTER join company on credential.logid=company.logid left outer join  student on credential.logid=student.logid";
        $output=mysqli_query($connect,$query);
echo '<table class="table">
        <th>LogID</th>
        <th>Email</th>
        <th>Type</th>
        <th>Name</th>
        <th>Status</th>
        <th class="btn btn-primary"  colspan=3  onclick=clicked()>Click here to ActivateControl</th>
                        ';
        while($row=mysqli_fetch_array($output))
        {
            echo '<tr>';
            echo '<td>'.$row['logid'].'</td>';
            echo '<td>'.$row['email'].'</td>';
            echo '<td>'.$row['type'].'</td>';
            
            if ($row['sname']==NULL)
            {
               echo '<td>'.$row['cname'].'</td>'; 
            }
            
              elseif ($row['cname']==NULL)
            {
               echo '<td>'.$row['sname'].'</td>'; 
            }
            echo '<td>'.$row['status'].'</td>';
            echo '<td  class="btn btn-success approve">Approve</td>';
            echo '<td  class="btn btn-warning block">Block</td>';
            echo '<td  class="btn btn-danger remove">Remove</td>';
            echo '</tr>';
        }
        echo '</table>';
       
?>
