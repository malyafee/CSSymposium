



<?php

/**
 * Created by Mohsin Alyafee.
 * User: seniorproject
 * Date: 2019-01-09
 * Time: 17:46
 */
/*
This page contains the database connection and user&password info.
Since this page is included in header.php, the connection and user
information will be passed through all pages in this project
*/


$host = 'localhost';
$user = 'Someuser';
$password = '123';
$db = 'Group';


$conn = mysqli_connect($host,$user,$password,$db)

or die ("enable to connect");


echo nl2br ("connect successfully\n");

session_start();
if(!isset($_SESSION['user_type']))
{
    $_SESSION['user_type'] = FALSE ;
}

$config['admin_password'] = 'admin123' ;
$config['judge_password'] = 'judge123' ;
$config['delay_hours'] = 2;
?>
