<?php
/*
This page display the schedule of all session
*/


include_once 'includes/connect.inc.php';
include_once "header.php";
?>


    <h3 class= "c">Schedule at Glance</h3><br><br>

<?php
//get subjects
$subject_q = mysqli_query($conn,"SELECT * FROM SUBJECT ORDER BY SUB_NAME");
$subject_result = mysqli_num_rows($subject_q);

if($subject_result>0)
{
    while($subject= mysqli_fetch_assoc($subject_q))
    { // display only subject that was registered with a session
        $student_q = mysqli_query($conn, "SELECT * FROM Student WHERE SUBJECT = '$subject[SUB_NAME]'");
        $student_result = mysqli_num_rows($student_q);
        if($student_result)
        {
            echo'<h3 class="b">'.$subject['SUB_NAME'].'</h3>';

            echo '<table id="t01">
            <tr>
              <th>Time</th>
              <th>Topic</th>
              <th>Room</th>
            </tr>';

            // display session information, when judge open this page , each topic will have a link with an id in order to evaluate
            while ($row = mysqli_fetch_assoc($student_q))
            {
                echo '<tr>
            <td>' . $row['FTIME']. '</td>
            <td>' . ($_SESSION['user_type']== 'judge' ? '<a href="includes/abstract.php?id='.$row['id'].' ">' . $row['TOPIC'] . '</a>' : $row['TOPIC']) . '</td>
            <td>' . $row['ROOM']. '</td>
            </tr>';
            }

            echo '</table>';
        }

    }
}

?>
    </body>
<?php
include_once "footer.php";
?>