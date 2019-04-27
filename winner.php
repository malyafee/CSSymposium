<?php
/*
This page display the winner of selected subject
*/


include_once "header.php";
if($_SESSION['user_type'] != 'admin') header('location: schedule.php');//only admin can see this, otherwise redirect to schedule page

?>
<!-- here is the dynamic arts of the winner topic -->
    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>

            .glow {
                font-size: 50px;
                color: #fff;
                text-align: center;
                -webkit-animation: glow 1s ease-in-out infinite alternate;
                -moz-animation: glow 1s ease-in-out infinite alternate;
                animation: glow 1s ease-in-out infinite alternate;
            }

            @-webkit-keyframes glow {
                from {
                    text-shadow: 0 0 10px #9de6f7, 0 0 20px #568daf, 0 0 30px #150091, 0 0 40px #150091, 0 0 50px #9de6f7, 0 0 60px #9de6f7, 0 0 70px #9de6f7;
                }

                to {
                    text-shadow: 0 0 20px #9de6f7, 0 0 30px #39a0c0, 0 0 40px #39a0c0, 0 0 50px #39a0c0, 0 0 60px #150091, 0 0 70px #150091, 0 0 80px #150091;
                }
            }
            h2.c {
                font-size: 300%;
            }
        </style>
    </head>
    <body>



    <?php

    $id = abs(intval($_GET['id']));   //1+ only positive like my database

    $subject_result = mysqli_query($conn, "SELECT * FROM SUBJECT WHERE SUB_ID ='$id' ");
    $subject = mysqli_fetch_assoc($subject_result);

    echo '<h2 class="c">The winner topic of '.$subject['SUB_NAME'].' is...</h2>';

    $sql = "SELECT  TOPIC, TOTAL
            FROM Student  
            WHERE  TOTAL = (SELECT MAX(TOTAL) FROM Student WHERE SUBJECT = '$subject[SUB_NAME]' )";                                                            // FROM Student)" ;

    $result = mysqli_query($conn,$sql);


    while($row =  mysqli_fetch_assoc($result) )
    {
        $win_fname = $row['TOPIC'];

        echo "<h1 class=\"glow\">$win_fname</h1>";
    }
    ?>




    </body>
    </html>

<?php
include_once "footer.php";
?>