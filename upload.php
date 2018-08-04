<?php
session_start();
if(isset($_SESSION['id']))
{
if ($_SESSION['type']=='student')
{
$id=$_SESSION['id'];
$type=$_SESSION['type'];
$folder="resume/";
$fname=$_FILES['resume']['name'];
$filepath=$folder.$fname;

if ($_FILES['resume']['type']=="application/pdf")
{
if($ok=move_uploaded_file($_FILES['resume']['tmp_name'],$filepath)){
    echo 'Uploaded Successfull';
    $connect=mysqli_connect("localhost","root","root","job");
    $query="insert into cv(filename,logid) values('$fname',$id)";
    $output=mysqli_query($connect,$query);}
else
    echo 'Problem Uploading file';
    header("refresh:2;account.php");  
}
else
{
    echo '<b>Uploaded File is not PDF</b> <i>you will be redirected</i> or <a href=edit.php?id=cv>click here</a>';
    header("refresh:3;edit.php?id=cv");
}
}
else
    echo '<h2>You are not supposed to Access this page !!</h2> ';
}else echo 'not logged in';
?>
