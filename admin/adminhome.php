<link href="../boot3/css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php
session_start();
if (isset($_SESSION['type']))
{
    if ($_SESSION['type']=='admin')
    {?>

    <style>


    </style>
    <script>
        function clicked() {
            var remove = document.getElementsByClassName("remove");
            var i;
            for (i = 0; i < remove.length; i++) {
                remove[i].onclick = function() {
                    var parent = this.parentElement;
                    var id = parent.firstChild.innerHTML;
                    var ok = confirm('do you want to delete ' + id);
                    if (ok == true) {
                        var x = new XMLHttpRequest;
                        x.open("get", "edit.php?id=" + id + "&oper=" + 0);
                        x.send();
                        x.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById('tab').innerHTML = this.responseText;
                            }
                        }
                    }
                }
            }
            var approve = document.getElementsByClassName("approve");
            var i = 0;
            for (i = 0; i < approve.length; i++) {
                approve[i].onclick = function() {
                    var parent = this.parentElement;
                    var id = parent.firstChild.innerHTML;
                    var ok = confirm('do you want to approve ' + id);
                    if (ok == true) {
                        var x = new XMLHttpRequest;
                        x.open("get", "edit.php?id=" + id + "&oper=" + 1);
                        x.send();
                        x.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById('tab').innerHTML = this.responseText;
                            }
                        }
                    }
                }
            }

            var block = document.getElementsByClassName("block");
            var i = 0;
            for (i = 0; i < block.length; i++) {
                block[i].onclick = function() {
                    var parent = this.parentElement;
                    var id = parent.firstChild.innerHTML;
                    var ok = confirm('do you want to Block ' + id);
                    if (ok == true) {
                        var x = new XMLHttpRequest;
                        x.open("get", "edit.php?id=" + id + "&oper=" + 2);
                        x.send();
                        x.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById('tab').innerHTML = this.responseText;
                            }
                        }
                    }
                }
            }
        }

    </script>
    <?php
        echo '<h1>Site Users</h1>';
        $connect=mysqli_connect("localhost","root","","job");
        $query="select credential.logid,email,credential.type,student.name as sname,company.name as cname,status from credential LEFT OUTER join company on credential.logid=company.logid left outer join  student on credential.logid=student.logid";
        $output=mysqli_query($connect,$query);
echo '<table class="table" id="tab">
        <th>LogID</th>
        <th>Email</th>
        <th>Type</th>
        <th>Name</th>
        <th>Status</th>
        <th class="btn btn-primary"  colspan=3  onclick=clicked()>Click here to ActivateControl</th>
                        ';
        while($row=mysqli_fetch_array($output))
        {
            echo '<tr>';
            echo '<td>'.$row['logid'].'</td>';
            echo '<td>'.$row['email'].'</td>';
            echo '<td>'.$row['type'].'</td>';
            
            if ($row['sname']==NULL)
            {
               echo '<td>'.$row['cname'].'</td>'; 
            }
            
              elseif ($row['cname']==NULL)
            {
               echo '<td>'.$row['sname'].'</td>'; 
            }
            echo '<td>'.$row['status'].'</td>';
            echo '<td  class="btn btn-success approve">Approve</td>';
            echo '<td  class="btn btn-warning block">Block</td>';
            echo '<td  class="btn btn-danger remove">Remove</td>';
            echo '<td onclick="message()"  class="btn btn-primary msg">Message</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    else   
    {?>

        <div class="container">
            <div class="page-header">
                <h1>Access Forbidden !</h1>
            </div>
            <p>You are not supposed to access this page</p>
            <p>Check your privelage</p>
        </div>
        <?php
    }
}
else
    echo 'not logged in';
?>
