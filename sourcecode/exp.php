<?php
session_start();
$c=$_GET['c'];
$p=$_GET['p'];
$s=$_GET['s'];
$e=$_GET['e'];
$id=$_SESSION['id'];
$connect=mysqli_connect("localhost","root","","job");
{
$query="insert into experience values($id,'$c','$p','$s','$e')";
$output=mysqli_query($connect,$query);
}
 $query="select * from experience where logid=$id";
$output=mysqli_query($connect,$query);
?>
    <table class="table" id="exptable">
        <th>Company</th>
        <th>Position</th>
        <th>From</th>
        <th>To</th>
        <?php
            while($row=mysqli_fetch_array($output))
                    {
                        echo '<tr>';
                        echo '<td>'.$row['company'].'</td>';
                        echo '<td>'.$row['position'].'</td>';
                        echo '<td>'.$row['fromdate'].'</td>';
                        echo '<td>'.$row['todate'].'</td>';
                                                echo '<td style="" class="closex">&times;</td>';

                        echo '</tr>';
                    }

?>
            <tr>
                <td class="addex" style=""><input id="addex1" type="text" placeholder="enter company" required></td>
                <td class="addex" style=""><input id="addex2" type="text" placeholder="enter position" required></td>
                <td class="addex" style=""><input id="addex3" type="date" placeholder="enter from date" required></td>
                <td class="addex" style=""><input id="addex4" type="date" placeholder="enter to date"></td>

                <td class="addex btn btn-success" onclick="addex()">Add+</td>
            </tr>

            <td style="" colspan="2" class="savex btn btn-primary" onclick="donex()">Done</td>

    </table>
