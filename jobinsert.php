<?php
session_start();
if(isset($_SESSION['id']))
{
if ($_SESSION['type']=='company')
{
$id=$_SESSION['id'];
$connect=mysqli_connect("localhost","root","","job");

?>
    <link type="text/css" href="boot3/css/bootstrap.css" rel="stylesheet">

    <table class="table">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Salary</th>
            <th>Expiry</th>
            <th>Skils required</th>
        </tr>
        <form action="" method="post">
            <tr>
                <td><input type="text" name="title"></td>
                <td><input type="text" name="desc"></td>
                <td><input type="text" name="sal"></td>
                <td><input type="date" name="exp"></td>
                <td><input type="text" name="skill"></td>
            </tr>
            <tr>
                <td colspan=5><input class="btn btn-danger" style="display:block height:100%;width:100%" type="submit" value="enlist" name="ok"></td>
            </tr>
        </form>

    </table>
    <?php
if (isset($_POST['ok']))
{
    $t=$_POST['title'];
    $d=$_POST['desc'];
    $s=$_POST['sal'];
    $e=$_POST['exp'];
    $sk=$_POST['skill'];
  
    $query="insert into jobs(logid,title,description,salary,closedate,skillset) values ($id,'$t','$d',$s,'$e','$sk')";
    $output=mysqli_query($connect,$query);
    

    header("location:comdetails.php");
}
}else echo 'ACCESS DENIED';
}else echo 'Not logged in';
?>
