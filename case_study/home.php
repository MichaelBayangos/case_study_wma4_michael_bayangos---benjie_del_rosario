<?php
session_start();
include("database_conn.php");
include("function.php");
$user_data = check_login($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="greetings">
        <button>
            <a href="logout.php" style="color: white; text-decoration : none;">Logout</a>
        </button>
        <h1>welcome</h1>
        <br>
        <h2>Put your thoughts into words <?php echo $user_data['user_name']; ?></h2>
    </div>
</body>

</html>