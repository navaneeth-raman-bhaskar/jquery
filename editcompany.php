<?php
session_start();
if(isset($_SESSION['id']))
{
if ($_SESSION['type']=='company')
{
$id=$_SESSION['id'];
$connect=mysqli_connect("localhost","root","","job");
$query="select * from company where logid=$id";
$output=mysqli_query($connect,$query);
$row=mysqli_fetch_array($output);
?>

    <link type="text/css" href="boot3/css/bootstrap.css" rel="stylesheet">
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name of company</label>
            <input class="form-control" type="text" name="name" value="<?=$row['name']?>" id="name" />
        </div>
        <div class="form-group">
            <label for="type">Type of company</label>
            <input class="form-control" type="text" name="type" value="<?=$row['type']?>" id="type" />
        </div>
        <div class="form-group">
            <input class="form-control btn btn-success" type="submit" value="save" name="save" />
        </div>
    </form>
    <?php
    if (isset($_POST['save']))
    {
        $name=$_POST['name'];
        $type=$_POST['type'];
        $query="update company set name='$name',type='$type' where logid=$id";
        $output=mysqli_query($connect,$query);
    }
}else echo 'ACCESS DENIED';
}else echo 'Not logged in';
    ?>
