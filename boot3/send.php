<?php
session_start();
if ($_SESSION['type']=='admin')
{
 $fromimgsrc="boot3/adm.jpg";
}

if ($_SESSION['type']=='student')
{
 $fromimgsrc="boot3/st.jpg";
}

if ($_SESSION['type']=='company')
{
 $fromimgsrc="boot3/com.jpg";
}

//////////////////////////////
$connect=mysqli_connect("localhost","root","root","job");

$logid=$_SESSION['id'];
$msg=$_GET['msg'];
$time=date("h:i:s");
$seen=0;
$toid=$_GET['toid'];
//////////////////////////////
$query="select type from credential where logid=$toid";
$output=mysqli_query($connect,$query);

$row=mysqli_fetch_array($output);



$type=$row['type'];
if ($type=='admin')
{
 $toimgsrc="boot3/adm.jpg";
}




if ($type=='student')
{
 $toimgsrc="boot3/st.jpg";
}

if ($type=='company')
{
 $toimgsrc="boot3/com.jpg";
}

///////////////////////////////////////

if($msg)
{
$query="insert into message(senderid,receiverid,msg,seen,time) values($logid,$toid,'$msg',$seen,'$time')";
$output=mysqli_query($connect,$query);

}
$query="select * from message where senderid=$logid and receiverid=$toid or receiverid=$logid and senderid=$toid order by time";
$output=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($output))
{
    if ($logid==$row['senderid'])
    {
?>

        <div class="contain">
            <img src="<?=$fromimgsrc?>" alt="Avatar" style="width:100%;">
            <p>
                <?=$row['msg']?>
            </p><span class="glyphicon glyphicon-arrow-up time-right"></span><span class="time-right"> <?=$row['time']?></span>
        </div>
        <?php
    }
    else
    {
    ?>

            <div class="contain darker">
                <img src="<?=$toimgsrc?>" alt="Avatar" class="right" style="width:100%;">
                <p>
                    <?=$row['msg']?>
                </p><span class="time-left"> <?=$row['time']?></span><span class="glyphicon glyphicon-arrow-down time-left"></span>
            </div>
            <?php
    }
}
$query="select online from status where logid=$toid";
$output=mysqli_query($connect,$query);
$row=mysqli_fetch_array($output);
if($row['online'])
{
?>
                <input type="hidden" id="onoroff" value="1">
                <?php
}
else
{
?>
                <input type="hidden" id="onoroff" value="0">
                <?php
}?>
