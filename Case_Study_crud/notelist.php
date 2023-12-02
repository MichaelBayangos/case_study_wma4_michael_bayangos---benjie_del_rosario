<?php
include("database.php");
//show all data in database
$sql = "SELECT * FROM notes ORDER BY reg_date DESC";
$result = mysqli_query($conn, $sql);
echo "<div class='notes'>";

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<div class='note'>";
    echo "<h2>" . $row['title'] . "</h2>";
    echo "<p class='noteList'>" . $row['content'] . "</p>";
    echo "<p>" . $row['reg_date'] . "</p>";

    // Add a delete button with a unique identifier for each note
    echo "<form action='delete_note.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
    echo "<button type='submit' class='deleteButton'>Delete Note</button>";
    echo "</form>";

    echo "</div>";
}

echo "</div>";
