<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

global $USER;

$email = $USER->email;

if (isloggedin() and $email == "shalommckdavid@gmail.com") {
    // User is logged in and email matches
    
} else {
    header("location: https://vskuul.com/login/index.php");
}