<?php
include("database.php");

if (isset($_POST['submits'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $updateQuery = "UPDATE notes SET title = '$title', content = '$content' WHERE id = '$id'";
    $upNote = mysqli_query($conn, $updateQuery);
    header("Location: home.php");
}

// Retrieve data from URL parameters
$updateid = $_GET['updateid'];
$title = urldecode($_GET['title']);
$content = urldecode($_GET['content']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="body">
    <div class="herobanner">
        <div class="form-container">
            <a href="logout.php" class="out">Logout</a>
            <div class="updateTitle">
                <h1 class="h1title">Update Note</h1>
            </div>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $updateid; ?>">
                <input type="text" class="title" name="title" placeholder="Title" value="<?php echo $title; ?>"><br><br>
                <textarea rows="10" cols="90" name="content" class="content" placeholder="Type here!"><?php echo $content; ?></textarea><br><br>
                <input type="submit" value="UPDATE" name="submits" class="submit">
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