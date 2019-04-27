




<?php
include_once 'includes/connect.inc.php';
include_once "header.php";
if($_SESSION['user_type'] != 'admin') header('location: schedule.php');//only admin can see this, otherwise redirect to schedule page

?>




    <h3 class= "c">Database Records</h3>
    <br>



    <table id="t01">
        <tr>
            <th>ID</th>
             <th>Name</th>
             <th>Topic</th>
            <th>Subject</th>
            <th>Room</th>
            <th>Total Score</th>
         </tr>
        <tr>
            <?php
            $sql = "SELECT * FROM Student ";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>
                                <td>" . $row["id"]. "</td>
                                 <td>" . $row["FNAME"]. "</td>
                                <td>" . $row["TOPIC"]. "</td>
                                <td>" . $row["SUBJECT"]. "</td>
                                <td>" . $row["ROOM"]. "</td>
                                <td>" . $row["TOTAL"] . "</td>
                              </tr>";
                }
            }

            ?>
        </tr>






    </table>


</body>


<?php
include_once "footer.php";
?>