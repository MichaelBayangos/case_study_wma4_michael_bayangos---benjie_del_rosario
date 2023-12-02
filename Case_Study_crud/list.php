<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="lstbck">
    <div class="div-thoughts">
        <h1>Your Thoughts Collection</h1>
    </div>
    <div id="notelistsection">
        <?php
        include("allNotes.php");
        ?>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const notelists = document.getElementById("notelistsection");
        //note lsit ajax
        function fetchdlist() {
            const xhr1 = new XMLHttpRequest();
            console.log(xhr1);
            xhr1.open("GET", "allNotes.php", true);
            xhr1.onload = function() {
                if (xhr1.status === 200) {
                    notelists.innerHTML = xhr1.responseText;
                }
            };
            xhr1.send();

        }
        fetchdlist();
        setInterval(fetchdlist, 1000);
    });
</script>

</html>