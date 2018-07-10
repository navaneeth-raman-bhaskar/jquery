<html>

<head>
    <link type="text/css" href="../JobPortal/boot3/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        form {
            width: 50%;
            margin: auto;
        }

    </style>
</head>

<body>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name.." class="form-control" required>
        </div>
        <div class="form-group">
            <label for="em">Email</label>
            <input type="email" id="em" name="email" placeholder="Your email.." class="form-control" required>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <select id="country" name="country" class="form-control">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>
        </div>
        <div class="form-group">
            <label for="feed">Feed back</label>
            <textarea id="feed" name="feed" placeholder="Write something.." style="height:200px" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit FeedBack" name="sub" class="form-control btn btn-primary">
        </div>
    </form>

</body>

<?php
if (isset($_POST['sub']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $country=$_POST['country'];
    $feed=$_POST['feed'];
    $connect=mysqli_connect("localhost","root","","job");
    $query="insert into feedback(name,email,country,feed) values('$name','$email','$country','$feed')";
    $output=mysqli_query($connect,$query);
    header("location:search.php");
}
?>


</html>
