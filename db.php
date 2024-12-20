<?php
$host = '134.90.167.42:10306';
$db = 'project_Ustyuzhanin';
$user = 'Ustyuzhanin';
$pass = '1sbgcM';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Don't do it! Could not connect to the database $db: " . $e->getMessage());
}
?>