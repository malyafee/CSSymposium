<?php

/*
This page show the comments of each student that judges wrote
*/
include_once 'includes/connect.inc.php';
include_once "header.php";
if($_SESSION['user_type'] != 'admin') header('location: schedule.php');//only admin can see this, otherwise redirect to schedule page

?>

<h3 class= "c">Database Records</h3>
<br>
<table id="t01">
    <tr>
        <th>Topic</th>
        <th>Judge's Comment</th>
    </tr>

    <tr>   <!--This SQL query joins two tables in order to display Topic column  from student table and comment column from comment table  -->
        <?php
        $sql = "SELECT * FROM Student INNER JOIN Comments ON Student.id = Comments.student_id ";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>
                                <td>" . $row["TOPIC"]. "</td>
                                 <td>" . $row["message"]. "</td>
                              </tr>";
            }
        }
        ?>
    </tr>
</table>
</body>


<?php
include_once "footer.php";
?>