<?php
session_start();
if((isset($_GET['sid'])&&isset($_GET['em']))||$_SESSION['type']=='student')
{
$id=$_SESSION['id'];
$email=$_SESSION['user'];
if (isset($_GET['sid']))
{
    $flag=1;
    $id=$_GET['sid'];
    $email=$_GET['em'];
    ?>
    <script>
        function hide() {
            var elem = document.getElementsByClassName("edit");
            var i = 0;
            for (i = 0; i < elem.length; i++) {
                elem[i].style.display = "none";
            }
        }

    </script>
    <?php
}
$connect=mysqli_connect("localhost","root","","job");
$query="select studid from student where logid=$id";
$output=mysqli_query($connect,$query);
$row=mysqli_fetch_array($output);
$sid=$row['studid'];
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>Document</title>
            <link type="text/css" href="../PHP/boot3/css/bootstrap.css" rel="stylesheet">
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
                    color: black;
                }

                .edit:hover {
                    color: brown;
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

                #add {
                    width: 250px;
                }

                #exptable input {
                    width: 200px;
                }

            </style>
            <script>
                function edit() {
                    var element = document.querySelectorAll(".close,.add,.save");
                    var i;
                    for (i = 0; i < element.length; i++) {
                        element[i].style.visibility = "visible";
                    }
                }

                function done() {
                    var element = document.querySelectorAll(".close,.add,.save");
                    var i;
                    for (i = 0; i < element.length; i++) {
                        element[i].style.visibility = "hidden";
                    }
                }

                function add() {
                    var skill = document.getElementById('add').value;
                    var x = new XMLHttpRequest;
                    x.open("get", "skill.php?skill=" + skill);
                    x.send();
                    x.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('skill').innerHTML = this.responseText;
                        }
                    }
                }

                function del() {
                    var close = document.getElementsByClassName("close");
                    var i;
                    for (i = 0; i < close.length; i++) {
                        close[i].onclick = function() {
                            var elem = this.parentElement;
                            elem.style.display = "none";
                            var remove = this.previousSibling.innerHTML;
                            var x = new XMLHttpRequest;
                            x.open("get", "delskill.php?remove=" + remove);
                            x.send();
                        }
                    }
                }

                function editex() {
                    var element = document.querySelectorAll(".closex,.addex,.savex");
                    var i;
                    for (i = 0; i < element.length; i++) {
                        element[i].style.display = "";
                    }
                }

                function donex() {
                    var element = document.querySelectorAll(".closex,.addex,.savex");
                    var i;
                    for (i = 0; i < element.length; i++) {
                        element[i].style.display = "none";
                    }
                }

                function delx() {
                    var close = document.getElementsByClassName("closex");
                    var i;
                    for (i = 0; i < close.length; i++) {
                        close[i].onclick = function() {
                            var elem = this.parentElement;
                            elem.style.display = "none";
                            var comp = elem.firstChild.innerHTML;
                            var pos = elem.firstChild.nextSibling.innerHTML;
                            var x = new XMLHttpRequest;
                            x.open("get", "delexp.php?comp=" + comp + "&pos=" + pos);
                            x.send();
                        }
                    }
                }

                function addex() {
                    var c = document.getElementById("addex1").value;
                    var p = document.getElementById("addex2").value;
                    var s = document.getElementById("addex3").value;
                    var e = document.getElementById("addex4").value;
                    var x = new XMLHttpRequest;
                    x.open("get", "exp.php?c=" + c + "&p=" + p + "&s=" + s + "&e=" + e);
                    x.send();
                    x.onreadystatechange = function() {
                        if (this.readyState = 4 && this.status == 200) {
                            document.getElementById("exptable").innerHTML = x.responseText;
                        }
                    }
                }

            </script>
        </head>

        <body <?php if(isset($_GET[ 'sid'])){echo 'onload="hide()"';}?>>
            <div class="container">
                <div class="row up">
                    <div class="col-md-3 photo">
                        <img src="boot3/st.jpg" height="" width="300px" alt="profile pic" class="img-circle">
                        <a href="edit.php?id=photo" class="edit"><span class="glyphicon glyphicon-pencil "></span></a>
                        <p style="font-size:30px;text-align:center;clear:both">
                            <?=$email?>
                        </p>
                    </div>
                    <div class="col-md-8 address">
                        <a href="edit.php?id=address" class="edit"> <span class="glyphicon glyphicon-pencil "></span></a>
                        <table class="table">
                            <h2>Contact Info</h2>
                            <?php
               {
                  $query="select * from about where id=$id";
                  $output=mysqli_query($connect,$query);
                $row=mysqli_fetch_array($output);
                        echo '<tr>';
                        echo '<th>House</th>';
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
                        <span onclick="edit();del();" class="glyphicon glyphicon-pencil edit "></span>
                        <tr>
                            <td>
                                <h2>Skills</h2>
                                <br><br>
                            </td>
                        </tr>
                        <table class="table" id="skill">
                            <?php
               {
                  $query="select * from skills where logid=$id";
                  $output=mysqli_query($connect,$query);
                    while($row=mysqli_fetch_array($output))
                    {
                        echo '<tr>';
                        echo '<td>'.$row['skill'].'</td>';
                        echo '<td style="visibility:hidden;" class="close">&times;</td>';
                        echo '</tr>';
                    }
               }
               ?>
                        </table>
                        <table class="table">
                            <tr>
                                <td class="add" style="visibility:hidden;"><input id="add" type="text" placeholder="enter skill" required></td>
                                <td style="visibility:hidden;" class="add btn btn-success" onclick="add();del();">Add+</td>
                            </tr>
                            <tr>
                                <td style="visibility:hidden;" colspan="2" class="save btn btn-primary" onclick="done()">Done</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-8 right">
                        <div class="row">
                            <div class="col-md-12 desc">
                                <a href="edit.php?id=desc" class="edit"><span class="glyphicon glyphicon-pencil "></span></a>
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
                                <table class="table" id="exptable">
                                    <h2>Experience</h2>
                                    <th>Company</th>
                                    <th>Position</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <?php
               {
                  $query="select * from experience where logid=$id";
                  $output=mysqli_query($connect,$query);
                    while($row=mysqli_fetch_array($output))
                    {
                        echo '<tr>';
                        echo '<td>'.$row['company'].'</td>';
                        echo '<td>'.$row['position'].'</td>';
                        echo '<td>'.$row['fromdate'].'</td>';
                        echo '<td>'.$row['todate'].'</td>';
                        echo '<td style="display:none;" class="closex">&times;</td>';
                        echo '</tr>';
                    }
               }
               ?>
                                        <tr>
                                            <td class="addex" style="display:none;"><input id="addex1" type="text" placeholder="enter company" required></td>
                                            <td class="addex" style="display:none;"><input id="addex2" type="text" placeholder="enter position" required></td>
                                            <td class="addex" style="display:none;"><input id="addex3" type="date" placeholder="enter from date" required></td>
                                            <td class="addex" style="display:none;"><input id="addex4" type="date" placeholder="enter to date"></td>
                                            <td style="display:none;" class="addex btn btn-success" onclick="addex()">Add+</td>
                                        </tr>
                                        <td style="display:none;" colspan="2" class="savex btn btn-primary" onclick="donex()">Done</td>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 cv">
                                <a href="edit.php?id=cv" class="edit"><span class="glyphicon glyphicon-pencil "></span></a>
                                <h2>Resume</h2>
                                <?php
                                $query="select * from cv where logid=$id ORDER BY cvid DESC";
                                $output=mysqli_query($connect,$query);
                        $row=mysqli_fetch_array($output);
                        ?>
                                    <a href="resume/<?php echo $row['filename'] ?>" target="_blank">
                                        <?=$row['filename']?>
                                    </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        <?php
}
?>
