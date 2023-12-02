<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud with ajax</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="body">
    <p id="time" class="time"></p>

    <div class="herobanner">
        <div class="form-container">
            <h1 class="h1title">Put your thoughts into words</h1>
            <form action="" method="POST">
                <input type="t  ext" class="title" name="title" placeholder="Title "><br><br>
                <textarea rows="10" cols="90" name="content" class="content" placeholder="Type here!"></textarea><br><br>
                <input type="submit" value="SUBMIT" name="submits" class="submit" onclick=" return mess();">
                <?php
                //insert data in database
                if (isset($_POST['submits'])) {
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $insert = "INSERT INTO notes (title,content) VALUES ('$title','$content')";
                    if (mysqli_query($conn, $insert)) {
                        header("Location: index.php");
                    }
                }
                ?>
            </form>
        </div>
    </div>
    <div id="notelistsection">
        <?php
        include("notelist.php");
        ?>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dataDiv = document.getElementById("time");
        const notelists = document.getElementById("notelistsection");

        function fetchdata() {
            const xhr = new XMLHttpRequest();
            console.log(xhr);
            xhr.open("GET", "time.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    dataDiv.innerHTML = xhr.responseText;
                }
            };
            xhr.send();

        }

        //note lsit ajax
        function fetchdlist() {
            const xhr1 = new XMLHttpRequest();
            console.log(xhr1);
            xhr1.open("GET", "notelist.php", true);
            xhr1.onload = function() {
                if (xhr1.status === 200) {
                    notelists.innerHTML = xhr1.responseText;
                }
            };
            xhr1.send();

        }
        fetchdata();
        setInterval(fetchdata, 1000);
        fetchdlist();
        setInterval(fetchdlist, 1000);
    });

    function mess() {
        alert("Your notes successfully saved");
        return true;
    }
</script>

</html>