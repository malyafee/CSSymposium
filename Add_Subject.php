<?php
/*
This page has two functionalities, Add and Delete Subjects
*/




include_once 'includes/connect.inc.php';
if($_SESSION['user_type'] != 'admin') header('location: schedule.php');//only admin can see this, otherwise redirect to schedule page


//when user click submit to add
if (isset($_POST['submit']))
{
// use mysql_real_escape_string()  to prevent the injection SQL
    $subject= mysqli_real_escape_string($conn, $_POST['subject']);
//add new subject into database
    $sqlQuery = "INSERT INTO SUBJECT (`SUB_NAME`) VALUE ('$subject')";


    //check the performance a query against the database
    if(mysqli_query($conn,$sqlQuery))
    {
        echo '<script language="javascript">';
        echo 'alert("Saved Successfully")';
        echo '</script>';
    }

    else
    {
        echo '<script language="javascript">';
        echo 'alert("Fail")';
        echo '</script>';
    }
}



//when user click submit to delete
elseif (isset($_POST['submitD']))
    {
    // use mysql_real_escape_string()  to prevent the injection SQL
    $subject= mysqli_real_escape_string($conn, $_POST['subjectD']);
    //add new subject into database
    $sqlQuery = " DELETE FROM SUBJECT WHERE  SUB_NAME = '$subject' ";


        //check the performance a query against the database
        if(mysqli_query($conn,$sqlQuery))
    {
        echo '<script language="javascript">';
        echo 'alert("Saved Successfully")';
        echo '</script>';    }


    else {
        echo '<script language="javascript">';
        echo 'alert("Failed")';
        echo '</script>';    }
    }

    ?>







<?php
include_once "header.php";
?>
                        <body>
                        <h3 class= "c">Add/Delete a Subject</h3>
                        <form action="Add_Subject.php" method="post">

                            <table  border="6.5">



                                <tr><td>Add a subject </td>


                                    <td><input type="text" name="subject" />
                                        <input class="button" type="submit" name="submit" value="Insert"/></td></tr>



                                <tr><td>Delete a subject</td>


                                    <?php
                                    //dropdown list of existing subject
                                    $sql = "SELECT SUB_NAME FROM SUBJECT ORDER BY SUB_NAME; ";
                                    $result = mysqli_query($conn,$sql);

                                    ?>

                                    <td> <select name="subjectD">


                                            <?php
                                        while($row =  mysqli_fetch_assoc($result) )
                                        {
                                            $dep_name = $row['SUB_NAME'];
                                            echo "<option value = '$dep_name'> $dep_name</option> ";
                                        }
                                        ?>

                                    </select>
                                        <input class="button" type="submit" name="submitD" value="Delete"/>
                                    </td></tr>


                            </table>
                            <br><br>


                            <hr/>


                        </form>

                        </body>

<?php
include_once "footer.php";
?>