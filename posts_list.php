<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Success</title>
</head>
<body>
    <h1>Login Successful!</h1>
    <p>Welcome to the dashboard.</p>
</body>
</html> -->


<?php
include 'db_connection.php';

$sql = "SELECT id, title, author, created_at FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>게시글 목록</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>게시글 목록</h2>
    <table>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><a href="post_view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></a></td>
                    <td><?php echo $row["author"]; ?></td>
                    <td><?php echo $row["created_at"]; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">게시글이 없습니다.</td>
            </tr>
        <?php endif; ?>
    </table>
    <p><a href="post_form.html"><button>게시글 작성</button></a></p>
</body>
</html>
