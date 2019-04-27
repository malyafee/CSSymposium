<?php
include_once "includes/connect.inc.php";

$email_time = time() - $config['delay_hours'] * 36000 ;// current time - 2 hours,

$result = mysqli_query($conn, "SELECT * FROM Comments WHERE email_sent = 0 AND time <= '$email_time'  ");// get record has 0 value

while($row = mysqli_fetch_assoc($result))
{
    $student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT EMAIL FROM Student WHERE id = '$row[student_id]' "));
    mail($student[email],'notification', $row[message]);
    mysqli_query($conn, "UPDATE Comments SET email_sent = 1 WHERE id = '$row[id]'");
}

