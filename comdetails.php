<?php
session_start();
if (isset($_SESSION['id']))
{
$who=$_SESSION['type'];
if ($who=='company')
{

$id=$_SESSION['id'];
$connect=mysqli_connect("localhost","root","","job");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link type="text/css" href="boot3/css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                background-color: #efebea;
            }

            .container {
                margin-top: 100px;
                width: 100%;

            }

            .up,
            .down {
                width: inherit;
            }

            .photo {
                margin: 10px;
                height: 300px;
                background-color: #efebea;
            }

            .address {
                margin: 50px;
                height: 400px;
                background-color: white;
            }

            .left {
                margin: 10px;
                height: 1300px;
                background-color: white;

            }

            .right {
                background-color: #efebea;
            }

            .exp,
            .desc,
            .cv {
                margin: 50px;

                background-color: white;
            }

            .edit {

                position: relative;
                float: right;
                font-size: 30px;
                top: 40px;
                right: 10px;
                cursor: pointer;
            }

            .close,
            .closex {
                text-align: center;
                font-size: 25px;
            }

            .close:hover {
                color: red;
                opacity: 1;
            }

            .closex:hover {
                cursor: pointer;
                color: red;
                opacity: 1;
            }

            .add,
            .addex {
                text-align: center;
                font-size: 25px;
                opacity: .75;
            }

            .add:hover,
            .addex:hover {
                opacity: 1;
            }

            .save,
            .savex {
                width: 100px;
            }

        </style>
    </head>

    <body>

        <div class="container">
            <div class="row up">
                <div class="col-md-3 photo">
                    <img src="../bg.jpg" height="" width="300px" alt="profile pic" class="img-circle">
                    <a href="edit.php?id=photo" class=""><span class="glyphicon glyphicon-pencil edit"></span></a>
                    <p style="font-size:30px;text-align:center;clear:both">
                        <?=$_SESSION['user']?>
                    </p>
                </div>
                <div class="col-md-8 address">
                    <a href="edit.php?id=address" class=""> <span class="glyphicon glyphicon-pencil edit"></span></a>
                    <table class="table">
                        <h2>Company Info</h2>
                        <?php
               
               {
                  $query="select * from about where id=$id";
                  $output=mysqli_query($connect,$query);
                $row=mysqli_fetch_array($output);
 
                        echo '<tr>';
                        echo '<th>Building</th>';
                        echo '<td>'.$row['buildName'].'</td>';
                        echo '</tr>';  
                        echo '<tr>';
                        echo '<th>Street</th>';
                        echo '<td>'.$row['street'].'</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>District</th>';
                        echo '<td>'.$row['district'].'</td>';
                        echo '</tr>';
                        echo '<th>State</th>';
                        echo '<td>'.$row['state'].'</td>';
                        echo '</tr>';
                        echo '<th>Country</th>';
                        echo '<td>'.$row['country'].'</td>';
                        echo '</tr>';
                        echo '<th>Pin</th>';
                        echo '<td>'.$row['pin'].'</td>';
                        echo '</tr>';
                        echo '<th>Mobile</th>';
                        echo '<td>'.$row['mob'].'</td>';
                        echo '</tr>';
                        
    
    
                
               }
               ?>
                    </table>
                </div>
            </div>
            <div class="row down">
                <div class="col-md-3 left">
                    <a href="editcompany.php"><span class="glyphicon glyphicon-pencil edit"></span></a>
                    <?php
                $query="select * from company where logid=$id";
                $output=mysqli_query($connect,$query);
                $row=mysqli_fetch_array($output);
                ?>
                        <table class="table">
                            <tr>
                                <td>
                                    <h2>Name</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                            echo $row['name']
                            ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2>Type</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                            echo $row['type']
                            ?>
                                </td>
                            </tr>
                        </table>
                </div>

                <div class="col-md-8 right">
                    <div class="row">
                        <div class="col-md-12 desc">
                            <a href="edit.php?id=desc" class=""><span class="glyphicon glyphicon-pencil edit"></span></a>
                            <table class="table">
                                <h2>Description</h2>
                                <?php
               
               {
                  $query="select * from about where id=$id";
                  $output=mysqli_query($connect,$query);
                    $row=mysqli_fetch_array($output);
                    {
                        echo '<tr>';
                        echo '<td>'.$row['description'].'</td>';
                        echo '</tr>';
                    }
    
                
               }
               ?>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 exp">
                            <span onclick="editex();delx();" class="glyphicon glyphicon-pencil edit"></span>
                            <td>
                                <h2>Job list</h2>
                            </td>
                            <table class="table">
                                <th>Title</th>
                                <th>Description</th>
                                <th>Salary (PA)</th>
                                <th>Expiring date</th>
                                <th>Skills required</th>
                                <?php
                        
$query="select * from jobs where logid=$id ";
$output=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($output))
{
    echo '<tr><h3>';
    echo '<td>'.$row['title'].'</td>';
    echo '<td>'.$row['description'].'</td>';
    echo '<td>'.$row['salary'].'</td>';
    echo '<td>'.$row['closedate'].'</td>';
    echo '<td>'.$row['skillset'].'</td>';
    ?>
                                    <td><a href="jobedit.php?id=<?=$row['jobid']?>">Edit</a></td>
                                    <td><a href="jobdelete.php?id=<?=$row['jobid']?>">Delete</a></td>


                                    <?php
    echo '</tr></h3>';
}   ?>
                                        <tr>
                                            <td><a href='jobinsert.php'>Add Job</a></td>
                                        </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 cv">
                            <a href="" class=""><span class="glyphicon glyphicon-pencil edit"></span></a>
                            <h2>Certification</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>
    <?php
}
    else echo 'ACCESS FORBIDDEN';
}
else
    echo 'NOT LOGGED IN';
?>
