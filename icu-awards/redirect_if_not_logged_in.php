<?php
/**
 * Created by PhpStorm.
 * User: andrewhill
 * Date: 2019-05-10
 * Time: 21:23
 */

session_start();

$date = new DateTime();
$current = $date->getTimestamp();
$two_hours = 7200;
if(!$_SESSION['loggedIn'] || $current - $_SESSION['loginTime'] > $two_hours) {
    session_destroy();
    header("Location:login.php");
    die("Redirecting to login.php");
}
