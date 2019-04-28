

<?php
/*
This page displays the abstract of the selected topic
*/
include_once "../header.php";
?>
                <h2>Abstract</h2><hr>

    <link rel="stylesheet" type="text/css" href="../style/style.css">




<?php

$id = abs(intval($_GET['id']));   //1+ only positive like my database


$sql = "SELECT * FROM Student WHERE id = '$id'";

$result = mysqli_query($conn,$sql);
$row =  mysqli_fetch_assoc($result);

    echo "<img src = '{$row['IMG']}' >";




    echo '<form  action="../form.php">

    <input type="hidden" name="id" value="'.$id.'">
    <button  class=" button  button_1" > Evaluate </button>


        </form> ';


 include_once "../footer.php";
?>