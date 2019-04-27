
<?php

/*
This page has the registration form
*/
include_once "header.php";
if($_SESSION['user_type'] != 'admin') header('location: schedule.php');//only admin can see this, otherwise redirect to schedule page
?>



<link rel="stylesheet" type="text/css" href="style/f.css">


<center>
                    <h3 class= "c">Insert a Session</h3>
    <form action="includes/registration.inc.php" method="post" enctype="multipart/form-data" >

        <table class="g" border="6.5">


            <tr><td>Time</td>
                <td>


                    <?php

                    $sql = "SELECT SESSION_TIME FROM TIME ORDER BY SESSION_TIME;";
                    $result = mysqli_query($conn,$sql);
                    ?>

                    <select name="frtime">

                        <?php//dropdown list in order
                        while($row =  mysqli_fetch_assoc($result) )
                        {
                            $time = $row['SESSION_TIME'];
                            echo "<option value = '$time'> $time</option> ";
                        }
                        ?>

                    </select>






                </td>
            </tr>






            <tr><td>First Name</td>
                <td><input type="text" name="Fname" required/></td></tr>

            <tr><td>Last Name</td>
                <td><input type="text" name="Lname"required/></td></tr>

            <tr><td>Email</td>
                <td><input type="text" name="email"required/></td></tr>

            <tr><td>Topic</td>
                <td><input type="text" name="topic"required/></td></tr>

            <tr><td>Subject</td>
                <td>

                    <?php

                    $sql = "SELECT DISTINCT SUB_NAME FROM SUBJECT ORDER BY SUB_NAME;";
                    $result = mysqli_query($conn,$sql);
                    ?>

                    <select id="wrapper" name="subject">

                        <?php//dropdown list in order
                        while($row =  mysqli_fetch_assoc($result) )
                        {
                            $dep_name = $row['SUB_NAME'];
                            echo "<option value = '$dep_name'> $dep_name</option> ";

                        }
                        ?>

                    </select>

                    <script>



                    </script>

                </td></tr>

            <tr><td>Room Number</td>
                <td>


                    <?php
                    $sql = "SELECT ROOM_NUM FROM ROOM;";
                    $result = mysqli_query($conn,$sql);
                    ?>

                    <select  name="room">

                        <?php
                        //dropdown list in order
                        while($row =  mysqli_fetch_assoc($result) )
                        {
                            $room_num = $row['ROOM_NUM'];
                            echo "<option value = '$room_num'> $room_num</option> ";
                        }
                        ?>

                    </select>
                </td></tr>


            <tr><td rowspan = "1">Gender</td>
                <td><input type="radio" name="gende" value="male"required/>Male
                    <input type="radio" name="gende" value="female"required/>Female</td>
            </tr>



<!--upload images of abstract-->
            <tr><td rowspan = "1">Upload Abstract</td>
                <td>
                        <input type="file" name="abstract"required>

                </td>
            </tr>


        </table>
        <br><br>
        <input class="button" type="submit" name="submit" value="Insert" />
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>


        <hr/>
    </form>
</center>

<?php

include_once "footer.php";
?>