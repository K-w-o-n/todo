<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>
    <?php
        $pdostmt = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
        $pdostmt->execute();
        $result = $pdostmt->fetchall();
    ?>
    <div class="container">
        <h2>Todo Home Page</h2>
        <div>
        <a href="create.php" class="btn btn-success" type="button">Create</a>
        </div><br>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Create</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            if($result) {
                                foreach ($result as $value) {
                        ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $value['title'] ?></td>
                                <td><?php echo $value['content'] ?></td>
                                <td><?php echo date('Y-m-d',strtotime($value['created_at'])) ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $value['id']; ?>" class="btn btn-warning" type="button">Edit</a>
                                    <a href="delete.php?id=<?php echo $value['id']; ?>" class="btn btn-danger" type="button">Delete</a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
