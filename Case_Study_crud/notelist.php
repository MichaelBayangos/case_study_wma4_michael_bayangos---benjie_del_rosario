<?php
//show all data in database
$sql = "SELECT * FROM notes";
$result = mysqli_query($conn, $sql);
echo "<div class='notes'>";

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<div class='note'>";
    echo "<h2>" . $row['title'] . "</h2>";
    echo "<p class='noteList'>" . $row['content'] . "</p>";
    echo "<p>" . $row['reg_date'] . "</p>";
    echo "</div>";
}
echo "</div>";
