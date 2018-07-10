<?php
if (isset($_POST['email']))
{
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $type=$_POST['type'];
$connect=mysqli_connect("localhost","root","","job");
$query="insert into credential(email,password,type,status) values('$email','$pass','$type',0);";
$output=mysqli_query($connect,$query);

    $query="select max(logid) as id from credential";
    $output=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($output);
    $id=$row['id'];
if ($type=='company')
{
    
    $cname=$_POST['cname'];
    $typ=$_POST['typ'];
   
$query="insert into company(name,type,logid) values('$cname','$typ','$id');";
$output=mysqli_query($connect,$query); 


}
elseif($type=='student')
{
    
    $sname=$_POST['sname'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
$query="insert into student(logid,name,gender,dob) values('$id','$sname','$gender','$dob');";
$output=mysqli_query($connect,$query);
}

$query="insert into about(id,type) values($id,'$type')";
$output=mysqli_query($connect,$query);
$query="insert into status(logid) values($id)";
$output=mysqli_query($connect,$query);
echo '<h2>Successfully Signed Up</h2><P>Please login</P';
header("refresh:3;layout.php");  
}else echo 'No ACCESS';
?>
