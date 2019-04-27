<?php
/*
This is the form page for the judges
*/




include_once 'includes/connect.inc.php';
if($_SESSION['user_type'] != 'judge') header('location: schedule.php');//only judges can see this page, otherwise  redirect to schedule.php


$id = abs(intval($_GET['id']));//1+
$sql = "SELECT * FROM Student WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
$row =  mysqli_fetch_assoc($result);

if (isset($_POST['submit']))
    {
    $q1= $_POST['q1'];
    $q2= $_POST['q2'];
    $q3= $_POST['q3'];
    $q4= $_POST['q4'];
    $q5= $_POST['q5'];
    $q6= $_POST['q6'];
    $q7= $_POST['q7'];
    $q8= $_POST['q8'];
    $q9= $_POST['q9'];
    $q10=$_POST['q10'];

    $comment= mysqli_real_escape_string($conn,$_POST['comment']);
    $total= $q1+$q2+$q3+$q4+$q5+$q6+$q7+$q8+$q9+$q10;    //adds up scores

    //insert total scores of student and judge's comment
    $total_new = $total+$row['TOTAL'];
    $sqlQuery = " UPDATE Student SET  TOTAL = '$total_new'  WHERE id =  '$id'";
    mysqli_query($conn, $sqlQuery);
    $time = time();
    mysqli_query($conn,"INSERT INTO Comments (`student_id`, `message`, `time` ) VALUES ('$row[id]','$comment','$time')") or die(mysqli_error($conn));

    //check the performance a query against the database
    if(mysqli_query($conn,$sqlQuery))
        {
            echo '<script language="javascript">';
            echo 'alert("Form has been submitted Successfully")';
            echo '</script>';
        }
    else
        {
            echo '<script language="javascript">';
            echo 'alert("Failed")';
            echo '</script>';
        }
        header("Location: schedule.php");

    }
?>


<?php
include_once "header.php";
?>

<style>
    p.x
    {
        font-size: 200%;
    }
    p.t
    {
        font-size: 100%;
    }

    input[type=radio]
    {
        border: 0px;
        width: 5%;
        height: 20px;
    }
</style>



    <h3 class= "c">  Evaluation Form </h3>
        <form method="post">

            <p class="t">1 = Poor</p>
            <p class="t">2 = Fair</p>
            <p class="t">3 = Good</p>
            <p class="t">4 = Excellent</p>
            <p class="t">5 = Superior</p>
            <center>
            <br><br>


<!--Form starts here-->
            <p class="x"> 1. Group’s knowledge of the material:</p>
            1.<input  type="radio" name="q1" value="1" required/>

            2.<input type="radio" name="q1" value="2" required/>

            3.<input type="radio" name="q1" value="3" required/>

            4.<input type="radio" name="q1" value="4" required/>

            5.<input type="radio" name="q1" value="5" required/>

            <br><br><br>
            <p class="x"> 2. Pertinence of slides to topic:</p>
            1.<input type="radio" name="q2" value="1" required/>

            2.<input type="radio" name="q2" value="2" required/>

            3.<input type="radio" name="q2" value="3" required/>

            4.<input type="radio" name="q2" value="4" required/>

            5.<input type="radio" name="q2" value="5" required/>

            <br><br>
            <p class="x"> 3. Flow of the presentation:</p>
            1.<input type="radio" name="q3" value="1" required/>

            2.<input type="radio" name="q3" value="2" required/>

            3.<input type="radio" name="q3" value="3" required/>

            4.<input type="radio" name="q3" value="4" required/>

            5.<input type="radio" name="q3" value="5" required/>

            <br><br>
            <p class="x"> 4. Definition of problem:</p>
            1.<input type="radio" name="q4" value="1" required/>

            2.<input type="radio" name="q4" value="2" required/>

            3.<input type="radio" name="q4" value="3" required/>

            4.<input type="radio" name="q4" value="4" required/>

            5.<input type="radio" name="q4" value="5" required/>

            <br><br>
            <p class="x"> 5. Information presented on the slides:</p>
            1.<input type="radio" name="q5" value="1" required/>

            2.<input type="radio" name="q5" value="2" required/>

            3.<input type="radio" name="q5" value="3" required/>

            4.<input type="radio" name="q5" value="4" required/>

            5.<input type="radio" name="q5" value="5" required/>

            <br><br><br>
            <p class="x"> 6. Definition of problem:</p>
            1.<input type="radio" name="q6" value="1" required/>

            2.<input type="radio" name="q6" value="2" required/>

            3.<input type="radio" name="q6" value="3" required/>

            4.<input type="radio" name="q6" value="4" required/>

            5.<input type="radio" name="q6" value="5" required/>

            <br><br><br>
            <p class="x"> 7. Impact of the problem:</p>
            1.<input type="radio" name="q7" value="1" required/>

            2.<input type="radio" name="q7" value="2" required/>

            3.<input type="radio" name="q7" value="3" required/>

            4.<input type="radio" name="q7" value="4" required/>

            5.<input type="radio" name="q7" value="5" required/>

            <br><br><br>
            <p class="x"> 8. References:</p>
            1.<input type="radio" name="q8" value="1" required/>

            2.<input type="radio" name="q8" value="2" required/>

            3.<input type="radio" name="q8" value="3" required/>

            4.<input type="radio" name="q8" value="4" required/>

            5.<input type="radio" name="q8" value="5" required/>

            <br><br><br>
            <p class="x"> 9. Type of oral information provided:</p>
            1.<input type="radio" name="q9" value="1" required/>

            2.<input type="radio" name="q9" value="2" required/>

            3.<input type="radio" name="q9" value="3" required/>

            4.<input type="radio" name="q9" value="4" required/>

            5.<input type="radio" name="q9" value="5" required/>

            <br><br><br>
            <p class="x"> 10. Question answered sufficiently:</p>
            1.<input type="radio" name="q10" value="1" required/>

            2.<input type="radio" name="q10" value="2" required/>

            3.<input type="radio" name="q10" value="3" required/>

            4.<input type="radio" name="q10" value="4" required/>

            5.<input type="radio" name="q10" value="5" required/>

            <br><br>                            <br><br>
            <p class="x">Comment:</p>
            <textarea name="comment"placeholder="Type something" rows="10" cols="90"required></textarea>
            <br><br>
                <!--Form ends here-->

            <input class="button" type="submit" name="submit" value="Submit">
        </form>
<?php
include_once "footer.php";
?>