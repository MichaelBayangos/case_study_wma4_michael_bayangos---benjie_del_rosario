<?php
include("database.php");

$sql = "SELECT * FROM notes ORDER BY reg_date DESC LIMIT 8";
$result = mysqli_query($conn, $sql);
echo "<div class='notes'>";

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<div class='note'>";
    echo "<h2>" . $row['title'] . "</h2>";
    echo "<p class='noteList'>" . $row['content'] . "</p>";
    echo "<p>" . $row['reg_date'] . "</p>";

    echo "<form action='delNotes.php' method='post' class='delform'>";
    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
    echo "</div>";
    echo "</form>";
}

echo "</div>";
