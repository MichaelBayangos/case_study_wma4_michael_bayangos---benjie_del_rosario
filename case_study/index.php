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
        const dataDiv1 = document.getElementById("home");

        function fetchdata1() {
            const xhr1 = new XMLHttpRequest();
            console.log(xhr1);
            xhr1.open("GET", "home.php", true);
            xhr1.onload = function() {
                if (xhr1.status === 200) {
                    dataDiv1.innerHTML = xhr1.responseText;
                }
            };
            xhr1.send();

        }
        fetchdata1();
        setInterval(fetchdata1, 1000);

    });
</script>

</html>