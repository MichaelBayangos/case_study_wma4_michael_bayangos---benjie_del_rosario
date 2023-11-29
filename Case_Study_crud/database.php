<?php
$conn = mysqli_connect("localhost", "root", "", "crud_db");
if (!$conn) {
    die('Connection Error' . mysqli_connect_error($conn));
}
