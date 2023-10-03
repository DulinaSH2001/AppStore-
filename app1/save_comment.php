<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $comment = $_POST['comment'];
    $appId = $_POST['appId'];

    include 'connect.php';

    $sql = "INSERT INTO comments (AppID, Comment) VALUES ('$appId','$comment')";
    if (mysqli_query($connect, $sql)) {
        
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
    $connect->close();
}
?>