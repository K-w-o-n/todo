<?php

    require 'config.php';
    $pdostmt = $pdo->prepare("DELETE FROM todo WHERE id=".$_GET['id']);
    $pdostmt->execute();

    header("location: index.php");

?>