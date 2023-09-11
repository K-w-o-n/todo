<?php
require 'config.php';

if($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];

    $pdostmt = $pdo->prepare("UPDATE todo SET title='$title', content='$content' WHERE id='$id'");
    $result = $pdostmt->execute();

    if($result) {
        echo "<script>alert('New Todo is updated');window.location.href='index.php';</script>";
    }
} else {
    $pdostmt = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostmt->execute();
    $result = $pdostmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Edit</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Edit New Todo</h2>
            <form action="edit.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $result['id'];?>">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result['title'] ?>" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Content</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control" required>
                    <?php echo $result['content'] ?>
                    </textarea>
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