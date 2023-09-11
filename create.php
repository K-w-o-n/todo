<?php
require 'config.php';

if($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    
    $sql = "INSERT INTO todo(title,content) VALUES (:title,:content)";
    $pdostmt = $pdo->prepare($sql);
    $result = $pdostmt->execute([
        ':title' => $title,
        ':content' => $content,
    ]);

    if($result) {
        echo "<script>alert('New Todo is created');window.location.href='index.php';</script>";
    }
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Create</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New Todo</h2>
            <form action="create.php" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Content</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="SUBMIT">
                    <a href="index.php" class="btn btn-default" type="button">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>