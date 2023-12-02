<?php
include("database.php");
if (isset($_POST['submits'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $insert = "INSERT INTO notes (title,content) VALUES ('$title','$content')";
    if (mysqli_query($conn, $insert)) {
        header("Location: home.php");
    }
}
