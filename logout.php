<?php  
session_start();
require 'dbh.php';

//destroy all session and redirect user to home page

session_destroy();
header('location: ' . DOMAIN . 'login.php' );
 
die();