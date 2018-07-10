<?php
session_start();
$id=$_SESSION['id'];
$jid=$_GET['id'];
$connect=mysqli_connect("localhost","root","","job");
$query="select * from jobs where jobid=$jid";
$output=mysqli_query($connect,$query);
$row=mysqli_fetch_array($output);
?>
    <link type="text/css" href="../PHP/boot3/css/bootstrap.css" rel="stylesheet">

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
                <td><input type="text" name="title" value="<?=$row['title']?>"></td>
                <td><input type="text" name="desc" value="<?=$row['description']?>"></td>
                <td><input type="text" name="sal" value="<?=$row['salary']?>"></td>
                <td><input type="date" name="exp" value="<?=$row['closedate']?>"></td>
                <td><input type="text" name="skill" value="<?=$row['skillset']?>"></td>
            </tr>
            <tr>
                <td colspan=5><input class="btn btn-danger" style="display:block height:100%;width:100%" type="submit" value="edit" name="ok"></td>
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

    $query="update jobs set  title='$t',description='$d',salary=$s,closedate='$e',skillset='$sk' where jobid=$jid";
    $output=mysqli_query($connect,$query);
    echo "<pre>";
    print_r($connect);
    echo "</pre>";

    header("location:comdetails.php");
}
?>
