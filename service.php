<?php

/*
This is the service page, only admin can open this page and use its features
*/
include_once "header.php";

if($_SESSION['user_type'] != 'admin') header('location: schedule.php');//only admin can see this, otherwise redirect to schedule page
?>

                    <h3 class= "c">Services</h3>

                    <a href="Reg_session.php" class="f">Register a Session</a>
                    <a href="winners_subject.php" class="f">View Winners</a>
                    <a href="Add_Subject.php" class="f">Add/Delete subject</a>
                     <a href="record.php" class="f">Records</a>
                    <a href="judge_comments.php" class="f">Judge Comments</a>
                    <a href="delete_records.php" class="f">Delete records</a>





                     </form>
                    </body>

<?php
include_once "footer.php";
?>