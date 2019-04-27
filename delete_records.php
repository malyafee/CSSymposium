/*
This page has a function to delete all records.
Deleting record should be done after taking a copy of the record
*/




<?php
include_once 'includes/connect.inc.php';
include_once "header.php";
if($_SESSION['user_type'] != 'admin') header('location: schedule.php');//only admin can see this, otherwise redirect to schedule page

?>
<h3 class= "c">Delete Database Records</h3>

    <form action="delete_records.php" method="post" >

<p>Are you sure you want to delete all records?</p>
<p>If yes, please click confirm deletion</p>
        <br>


<input class="button" type="submit" name="submit" value="Confirm Deletion" />



<?php

        if(isset($_POST['submit']))
        {
         $sqlQuery = "DELETE FROM Student ";


            //check the performance a query against the database
            mysqli_query($conn,$sql);


            if (mysqli_query($conn, $sqlQuery))
            {
                echo '<script language="javascript">';
                echo 'alert("Data has been deleted")';
                echo '</script>';

            }
            else
            {
                echo "\r\n-(Failed to delete)";
            }
        }


?>

</form>
</body>


<?php
include_once "footer.php";
?>