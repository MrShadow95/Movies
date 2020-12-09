<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'movies';

$con = mysqli_connect($host, $user, $pass, $db);

if ($con) {
    // echo "connected";
} else {
    echo "not connected";
}
