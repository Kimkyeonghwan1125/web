<?php
include 'db_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($password)) {
    header("Location: index.html?error=emptypassword");
    exit;
}

$sql = "SELECT username, password FROM member WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($password === $row['password']) { // 단순 문자열 비교
        header("Location: success.php");
        exit;
    } else {
        header("Location: index.html?error=incorrectpassword");
        exit;
    }
} else {
    header("Location: index.html?error=nouser");
    exit;
}

$conn->close();
?>
