<?php
include 'db_connection.php';

$id = $_GET['id'];

$sql = "SELECT title, content, author, created_at FROM posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // 게시글이 존재하는 경우
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row["title"]; ?></title>
    <style>
        .post-container {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .post-title {
            font-size: 24px;
            color: #333;
        }
        .post-meta {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }
        .post-content {
            font-size: 16px;
            color: #444;
        }
    </style>
</head>
<body>
    <div class="post-container">
        <div class="post-title"><?php echo $row["title"]; ?></div>
        <br>
        <div class="post-content"><?php echo nl2br($row["content"]); ?></div>
        <br>
        <div class="post-meta">
            <span>Author: <?php echo $row["author"]; ?></span><br>
            <span>Created at: <?php echo $row["created_at"]; ?></span>
        </div>

    </div>
</body>
</html>
<?php
} else {
    // 게시글이 존재하지 않는 경우
    echo "Post not found";
}

$stmt->close();
$conn->close();
?>
