<?php

//connection details to connect to database

/* $host_name = "freedb.tech";
$username = "freedbtech_brunofdb";
$password = "yM4NhgfbXVEZGsr";
$db_name = "freedbtech_brunofdb"; */

$host_name = "localhost";
$username = "root";
$password = "";
$db_name = "weatherapp";

$db_conn = mysqli_connect($host_name, $username, $password, $db_name);
if (!$db_conn) {
    die("Connection Error: " . mysqli_connect_error());
}
