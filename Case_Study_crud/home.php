<?php
session_start();
include("function.php");
include("database.php");
include("submit.php");
$user_data = check_login($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="body" class="body">
    <div class="herobanner">
        <div class="form-container">
            <a href="logout.php" class="out">Logout</a>
            <h1 class="h1title">Put your thoughts into words <?php echo $user_data['user_name']; ?></h1>
            <form action="" method="POST">
                <input type=" t ext" class="title" name="title" placeholder="Title "><br><br>
                <textarea rows="10" cols="90" name="content" class="content" placeholder="Type here!"></textarea><br><br>
                <input type="submit" value="SUBMIT" name="submits" class="submit">
            </form>
        </div>
    </div>
    <div id="notelistsection">
        <?php
        include("notelist.php");
        ?>
    </div>
    <div class="listredi">
        <a href="list.php" target="_blank" class="listred">see more</a>
    </div>
</body>

</html>