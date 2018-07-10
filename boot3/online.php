<?php
session_start();
$query="select online from status where logid=$toid";
$output=mysqli_query($connect,$query);
$row=mysqli_fetch_array($output);
if($row['online'])
{
?>
<p id="onlinestatus"></p>
<?php
}
?>