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
    <title>home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="home_background">
    <a href="logout.php">Logout</a>
    <div class=greetings>
        <h1>welcome</h1>
        <br>
        <h2>Put your thoughts into words <?php echo $user_data['user_name']; ?></h2>
    </div>
    <p id="data"></p>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dataDiv = document.getElementById("data");

        function fetchdata() {
            const xhr = new XMLHttpRequest();
            console.log(xhr);
            xhr.open("GET", "get_data.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    dataDiv.innerHTML = xhr.responseText;
                }
            };
            xhr.send();

        }
        fetchdata();
        setInterval(fetchdata, 1000);
    });
</script>

</html>