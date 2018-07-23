<?php
session_start();
if(isset($_SESSION['id']))
{
if ($_SESSION['type']=='student'||$_SESSION['type']=='company')
{
$logid=$_SESSION['id'];
$who=$_SESSION['type'];
$id=$_GET['id'];
$connect=mysqli_connect("localhost","root","","job");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link type="text/css" href="boot3/css/bootstrap.css" rel="stylesheet">
    </head>

    <body>
        <?php
    if ($id=='desc')
    {
    $query="select description from about where id=$logid";
    $output=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($output);
    ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="desc">About You</label>
                    <input class="form-control" type="text" name="desc" value="<?=$row['description']?>" id="desc" />
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-success" type="submit" value="Save" name="save" />
                </div>
            </form>
            <?php
    if (isset($_POST['save']))
    {
        $desc=$_POST['desc'];
        $query="update about set description='$desc' where id=$logid";
        $output=mysqli_query($connect,$query);
        if ($who=='student')
                    header("location:account.php");
        elseif($who=='company')
                    header("location:comdetails.php");
    }
    }
    elseif($id=='address')
    {
    $query="select * from about where id=$logid";
    $output=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($output);
    ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="house">Building</label>
                        <input class="form-control" type="text" name="house" value="<?=$row['buildName']?>" id="house" />
                    </div>
                    <div class="form-group">
                        <label for="street">Street</label>
                        <input class="form-control" type="text" name="street" value="<?=$row['street']?>" id="street" />
                    </div>
                    <div class="form-group">
                        <label for="dist">District</label>
                        <input class="form-control" type="text" name="dist" value="<?=$row['district']?>" id="dist" />
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input class="form-control" type="text" name="state" value="<?=$row['state']?>" id="state" />
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input class="form-control" type="text" name="country" value="<?=$row['country']?>" id="coutry" />
                    </div>
                    <div class="form-group">
                        <label for="pin">Pin</label>
                        <input class="form-control" type="text" name="pin" value="<?=$row['pin']?>" id="pin" />
                    </div>
                    <div class="form-group">
                        <label for="mob">Mobile No</label>
                        <input class="form-control" type="text" name="mob" value="<?=$row['mob']?>" id="mob" />
                    </div>

                    <div class="form-group">
                        <input class="form-control btn btn-success" type="submit" value="Save" name="save" />
                    </div>
                </form>

                <?php
        if (isset($_POST['save']))
    {
        $h=$_POST['house'];
        $st=$_POST['street'];
        $d=$_POST['dist'];
        $s=$_POST['state'];
        $c=$_POST['country'];
        $p=$_POST['pin'];
        $m=$_POST['mob'];
        $query="update about set buildName='$h',street='$st',district='$d',state='$s',country='$c',pin='$p',mob='$m' where id=$logid";
        $output=mysqli_query($connect,$query);
         if ($who=='student')
                    header("location:account.php");
        elseif($who=='company')
                    header("location:comdetails.php");
    }
            }
    elseif($id=='cv'){
        ?>
                    <form action="upload.php" method="post" enctype="multipart/form-data" style="width:50%;margin:auto;margin-top:200px;">
                        <div class="form-group">
                            <label for="">Upload Resume in pdf format </label>
                            <input type="file" name="resume" class="form-control">
                        </div>
                        <input type="submit" name="sub" value="Upload" class="form-control btn btn-info">
                    </form>
                    <?php
    }
}else echo 'ACCESS DENIED';
}else echo 'Not logged in';
?>

    </body>

    </html>
