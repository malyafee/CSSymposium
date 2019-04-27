<?php
/*
This page displays the subjects and wait for admin to choose one to display the winner of that selected subject
*/


include_once "header.php";
if($_SESSION['user_type'] != 'admin') header('location: schedule.php');//only admin can see this, otherwise redirect to schedule page

?>

<h3 class= "c">Choose the winner of:</h3>

<?php

$subject_q = mysqli_query($conn,"SELECT * FROM SUBJECT ORDER BY SUB_NAME");
$subject_result = mysqli_num_rows($subject_q);

if($subject_result>0)
{
    while($subject= mysqli_fetch_assoc($subject_q))
    {
        $student_q = mysqli_query($conn, "SELECT * FROM Student WHERE SUBJECT = '$subject[SUB_NAME]'");
        $student_result = mysqli_num_rows($student_q);
        if($student_result)
        {
             echo ' <a href="winner.php?id='.$subject['SUB_ID'].'" class="x">'.$subject['SUB_NAME'].'  </a><br>';
        }
    }
}
?>


<?php
include_once "footer.php";


?>



