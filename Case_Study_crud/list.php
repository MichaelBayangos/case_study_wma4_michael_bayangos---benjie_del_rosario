<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes List</title>
</head>

<body>
    <div id="notelistsection">
        <?php
        include("notelist.php");
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
            xhr1.open("GET", "notelist.php", true);
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