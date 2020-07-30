<?php
/**
 * Created by PhpStorm.
 * User: andrewhill
 * Date: 2019-05-10
 * Time: 22:28
 */

$authorised_users = ["ah4515", "ojh14", "df513", "mhh114", "ac3912", "clc214", "hhart", "foepres", "dpfs", "chair", "medic", "tff14", "sheep"];

function sheep($username, $password) {
    $actual_username = "sheep";
    $actual_password = "lover";
    return $username === $actual_username && $password === $actual_password;
}