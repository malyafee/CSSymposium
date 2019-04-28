



<?php
/*
After user click on "submit" button in Reg_session.php to insert student information,
this page contain the functionality of insertion  student to the database.
Also, the abstract picture will be saved in folder name "Abstract_Images"
*/

include_once "connect.inc.php";


if (isset($_POST['submit']))
    {
    //*------------------------------------------------
    //*
    //* gets the values submitted for the fields
    //* used mysql_real_escape_string()  to prevent SQL injection 
    //*------------------------------------------------
    $email=     mysqli_real_escape_string($conn, $_POST['email']);
    $frtime=    mysqli_real_escape_string($conn, $_POST['frtime']);
    $Firstname= mysqli_real_escape_string($conn, $_POST['Fname']);
    $Lastname=  mysqli_real_escape_string($conn, $_POST['Lname']);
    $topic=     mysqli_real_escape_string($conn, $_POST['topic']);
    $gender=    mysqli_real_escape_string($conn, $_POST['gende']);
    $subject=   mysqli_real_escape_string($conn, $_POST['subject']);
    $room=      mysqli_real_escape_string($conn, $_POST['room']);

    //Upload the Image
    $target_dir = "Abstract_Images/"; // uploads must be in the right path
    $target_file = $target_dir . basename( $_FILES['abstract']['name']);




//*------------------------------------------------
// *
// *Check Duplication  (Student and session Time)
// *
// **-----------------------------------------------*/
    $check_dup_time_person = " SELECT * FROM Student WHERE FTIME = '$frtime' AND EMAIL = '$email'";
    $check_dup_time_room = "   SELECT * FROM Student WHERE FTIME = '$frtime' AND ROOM = '$room'";

    //create the the rows
    $result1 = mysqli_query($conn, $check_dup_time_person);
    $result2 = mysqli_query($conn, $check_dup_time_room);

    //count how many duplicate rows
    $count1 = mysqli_num_rows($result1);
    $count2 = mysqli_num_rows($result2);

// if there is 1 or more records in the DB,
// system will deny the insertion (Preventing duplication)
    if ($count1 > 0 && $count2 > 0)
        {   echo '<script language="javascript">';
            echo 'alert("Error: 1- (Name) is already presenting at this time
            --2- A session is already been reserved at this time")';
            echo '</script>';

        }
    elseif($count1 > 0)
        {
            echo '<script language="javascript">';
            echo 'alert("Error: 1- This student is already presenting at this time")';
            echo '</script>';

        }
    elseif($count2 > 0)
        {
            echo '<script language="javascript">';
            echo 'alert("Error: 2- A session is already been reserved at this time")';
            echo '</script>';
        }
    else {//no error occured, then insert session
        $sqlQuery = "INSERT INTO Student(`EMAIL`, `FTIME`, `FNAME`,`LNAME`,`IMG`, `TOPIC`,
                                         `GENDER`, `SUBJECT`, `ROOM`, `COMMENT`, `JUDGE_ID`, `TOTAL`) 
                     VALUES ('$email', '$frtime', '$Firstname', '$Lastname','$target_file', '$topic'
                                , '$gender', '$subject', '$room', '', '', '0')";



        move_uploaded_file($_FILES['abstract']['tmp_name'], "up/$file");

        echo '<script language="javascript">';
        echo 'alert("Session has been inserted successfully ")';
        echo '</script>';
        //if submitted successfully, save abstract image in file





        }
    //header("Location: ../Reg_session.php");


    }
?>
