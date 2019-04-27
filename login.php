<?php

/*
Login page
*/

include_once "header.php";


if($_SESSION['user_type']) // if user clicks on logout button, the then that user will be unset
{
    unset($_SESSION['user_type']);//when unset, user logout
    header('location: login.php');
    exit();
}




if(!empty($_POST['psw']))
{
    $psw = htmlspecialchars($_POST['psw']);



    if($psw == $config['admin_password'])
    {
        $_SESSION['user_type'] = 'admin'; // session = admin
        header('location: service.php');  // direct to service.php
        exit();
    }

    elseif ($psw == $config['judge_password'])
    {
        $_SESSION['user_type'] = 'judge';//if password matches the judge password in connect.inc.php
        header('location: judge.php');// direct to judge.php
        exit();
    }

    else
    {
        echo '<script language="javascript">';
        echo 'alert("wrong password")';
        echo '</script>';
    }
}
 ?>

  <h3 class= "c">Login</h3>
<body>
  <div class="container">

    <b class= "c" >Enter Password:</b>

    <form action="login.php" method="post">

        <input  type="password" placeholder="Please Enter Password" name="psw" required>
        <button class=" button  button_1" type="submit">Login</button>

    </form>
  </div>
 </body>

<?php
include_once "footer.php";
?>