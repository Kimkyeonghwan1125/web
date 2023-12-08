<?php
$servername = "127.0.0.1:3388";
$dbUsername = "root"; // 데이터베이스 사용자 이름
$dbPassword = ""; // 데이터베이스 비밀번호
$dbName = "users"; // 데이터베이스 이름

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
