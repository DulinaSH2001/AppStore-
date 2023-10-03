<?php
$DB_name = 'onlineappstore';
$DB_username = 'root';
$DB_password = '';
$server = 'localhost';

$connect = mysqli_connect($server, $DB_username, $DB_password, $DB_name);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>