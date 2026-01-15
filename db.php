<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "firstyworld";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>
