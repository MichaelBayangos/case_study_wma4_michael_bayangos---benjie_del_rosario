<?php
include('database.php');

// Get the note ID from the form
$noteId = $_POST['id'];

// Delete the note from the database
$sql = "DELETE FROM notes WHERE id = '$noteId'";
mysqli_query($conn, $sql);

// Redirect back to the main page
header("Location: home.php");
