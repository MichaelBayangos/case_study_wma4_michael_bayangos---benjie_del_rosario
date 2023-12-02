<?php
include('database.php');

// Get the note ID from the form
$allList = $_POST['id'];

// Delete the note from the database
$sql = "DELETE FROM notes WHERE id = '$allList'";
mysqli_query($conn, $sql);

// Redirect back to the list page
header("Location: list.php");
