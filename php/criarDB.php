<?php
$envfile = parse_ini_file('../.env');
$servername = $envfile["SERVER_NAME"]; 
$dbusername = $envfile["DB_USERNAME"];
$dbpassword = $envfile["DB_PASSWD"];
$dbname = $envfile["DB_NAME"];

try {
    // Source - https://stackoverflow.com/a/19986035
    // Posted by Your Common Sense
    // Retrieved 2026-05-22, License - CC BY-SA 3.0

    $conn = new PDO("mysql:host=$servername", $dbusername, $dbpassword);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn -> query("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn -> query("use $dbname");

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Could not connect. " . $e->getMessage());
}