<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link type="text/css" href="boot3/chat.css" rel="stylesheet">

    <link type="text/css" href="../PHP/boot3/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="../PHP/jq/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../PHP/boot3/js/bootstrap.js"></script>


    <style>
        body {
            background-color: #efebea;
        }

        .modal-header,
        h4,
        .close {
            background-color: black;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-footer {
            background-color: #f9f9f9;
        }

        .modal-dialog {
            margin-top: 0;
        }

        .menu {
            display: none;
            position: absolute;
        }

        li.drop:hover .menu {
            display: block;
        }

        .inbo {
            width: 120px;
            background-color: beige;
        }

        .inbo:hover {
            background-color: bisque;

        }

    </style>
    <script>
        function load(id) {
            // var id = document.getElementById("c").value;
            // alert(id);
            var xhttp = new XMLHttpRequest();
            if (id == "student")
                xhttp.open("GET", "s.php?id=" + id, true);
            else if (id == "company")
                xhttp.open("GET", "c.php?id=" + id, true);
            else
                xhttp.open("GET", "b.php?id=" + id, true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // alert(xhttp.responseText);
                    document.getElementById("dyn").innerHTML = xhttp.responseText;
                }
            };
        }

    </script>

</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="search.php" target="dynamic">JobQuery&reg;</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="joblist.php" target="dynamic">Available Jobs</a></li>
                <li><a href="company.php" target="dynamic">Company Lists</a></li>
                <li><a href="feedback.php" target="dynamic">Feedback</a></li>
                <?php
                 if (isset($_SESSION['type']))
                if ($_SESSION['type']=='student')
                {?>
                    <li><a href="appliedjob.php" target="dynamic">AppliedJobs</a></li>
                    <?php
                      }
                ?>
                        <?php
                 if (isset($_SESSION['type']))
                if ($_SESSION['type']=='company')
                {?>
                            <li><a href="appliedcand.php" target="dynamic">AppliedCandidates</a></li>
                            <?php
                      }
                ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
       if (isset($_SESSION['type']))
       {
        ?>
                    <li class="drop"><a class="btn"><span class="glyphicon glyphicon-comment"></span> Messages</a>
                        <ul class='menu' style="list-style-type:none;margin:0;padding:0;">

                            <?php
           /////////////////////////////////
           $logid=$_SESSION['id'];
           $type=$_SESSION['type'];
        $connect=mysqli_connect("localhost","root","","job");

           if ($type=='student')
           {
           $query="select company.logid as toid,company.name as sender FROM applied inner join jobs on applied.jobid=jobs.jobid INNER join company on company.logid=jobs.logid WHERE applied.logid=$logid  group by toid";
           $output=mysqli_query($connect,$query);
           while($row=mysqli_fetch_array($output))
           {


               echo '<li class="btn inbo" onclick=message('.$row['toid'].',this)>'.$row['sender'].'</li>';

           }
           }
           elseif ($type=='company')
           {
           $query="SELECT student.logid as toid,student.name as sender from applied inner join student on applied.logid=student.logid INNER join jobs on jobs.jobid=applied.jobid where jobs.logid=$logid GROUP by student.logid";
           $output=mysqli_query($connect,$query);
           while($row=mysqli_fetch_array($output))
           {


               echo '<li class="btn inbo" onclick=message('.$row['toid'].',this)>'.$row['sender'].'</li>';

           }
           }
           if ($type!='admin')
           {
           $query="select logid from credential where type='admin'";
           $output=mysqli_query($connect,$query);
            while($row=mysqli_fetch_array($output))
           {


               echo '<li class="btn inbo" onclick=message('.$row['logid'].',this)>Admin'.$row['logid'].'</li>';

           }
           }
           if ($type=='admin')
           {
               $query="select senderid as toid,student.name as sname,company.name as cname from message left join student on student.logid=message.senderid LEFT join company on company.logid=message.senderid WHERE receiverid=5 GROUP BY senderid ";
               $output=mysqli_query($connect,$query);
               while($row=mysqli_fetch_assoc($output))
               {
                   if($row['cname']==NULL)
                       $name=$row['sname'];
                   if($row['sname']==NULL)
                       $name=$row['cname'];
        echo '<li class="btn inbo" onclick=message('.$row['toid'].',this)>'.$name.'</li>';

               }

       }
           /////////////////////////
    ?>

                        </ul>

                    </li>

                    <?php
       }
                if (isset($_SESSION['type'])) if (($_SESSION['type'])=='admin') { ?>
                        <li><a href="admin/adminhome.php" target="dynamic"><span class="glyphicon glyphicon-cog"></span>Controll Panel</a></li>

                        <?php
                }
               if (isset($_SESSION['type']))
               if (($_SESSION['type'])=='company')
               {
                       ?>
                            <li><a href="comdetails.php" target="dynamic"><span class="glyphicon glyphicon-equalizer"></span>Company Details</a></li>

                            <?php
                }
                if (isset($_SESSION['type']))
                {

                } if (isset($_SESSION['type']))
                if (($_SESSION['type'])=='student')
                {
               ?>
                                <li><a href="account.php" target="dynamic"><span class="glyphicon glyphicon-user"></span> Account</a></li>
                                <?php
                }
                if (!isset($_SESSION['user']))
                {
               ?>
                                    <li class="sign"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                    <?php
                }
                if (!isset($_SESSION['user']))
                {
                    ?>
                                        <li class="log"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                        <?php
                }
                 if (isset($_SESSION['user']))
                 {
                ?>
                                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                                            <?php }
                ?>
            </ul>
        </div>
    </nav>
    <iframe id="frame" name="dynamic" src="search.php" width="100%" height="700" style="border: none" scrolling="">
    </iframe>
    <!--LOgin Modal -->

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width: 500px;margin: auto;top: 100px;">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action="login.php">
                        <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                            <input type="text" class="form-control" id="usrname" placeholder="Enter email" name="username" value="<?php if(isset($_COOKIE['u'])){echo $_COOKIE['u'];}?>">
                        </div>
                        <div class="form-group">
                            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                            <input type="password" class="form-control" id="psw" placeholder="Enter password" name="password" value="<?php if(isset($_COOKIE['p'])){echo $_COOKIE['p'];}?>">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="1"  name="remem" <?php if(isset($_COOKIE['u'])){echo 'checked="checked"';}?>>Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <p>Forgot <a href="#">Password?</a></p>
                    <p>Not a member? <a class="sign" href="#" data-dismiss="modal">Sign Up</a></p>

                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".log").click(function() {
                $("#myModal").modal();
            });
            $(".sign").click(function() {
                $("#myModal").modal('hide');
            });

        });

    </script>
    <!--Signup Modal -->

    <div class="modal fade" id="SModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 500px;margin: auto;top: 100px;">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> SignUp</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action="signup.php">
                        <div class="form-group">
                            <label for="uname"><span class="glyphicon glyphicon-user"></span> Username</label>
                            <input type="text" class="form-control" id="uname" placeholder="Enter email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pswd"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                            <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="pswd2"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                            <input type="password" class="form-control" id="pswd2" placeholder="Confirm password" name="password2" required>
                        </div>
                        <div class="form-group">
                            <label for="type">You are a</label>
                            <select class="form-control" onchange="load(this.value)" name="type" required>
                                <option value="">--SELECT--</option>
                                <option value="student">Student</option>
                                <option value="company">Company</option>
                            </select>
                        </div>
                        <div id="dyn"></div>
                        <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> SignUp</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <p>Already a member? <a class="log" href="#">Login</a></p>

                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".sign").click(function() {
                $("#SModal").modal();
            });
            $(".log").click(function() {
                $("#SModal").modal('hide');
            });

        });

    </script>



    <aside></aside>
    <?php
    if (isset($_SESSION['user']))
    {
    require('boot3/chat.php');
    }
    ?>
</body>

</html>
