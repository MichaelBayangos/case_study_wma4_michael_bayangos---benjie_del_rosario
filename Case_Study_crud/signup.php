<?php
session_start();
include("database.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        $user_id = random_num(20);
        $sql = "INSERT INTO users (user_id , user_name, password) VALUES ('$user_id' , '$user_name', '$password')";
        mysqli_query($conn, $sql);
        header("Location: login.php");
        die;
    } else {
        echo "enter valid username";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>signup</title>
</head>

<body class="loginbck">
    <div class="divLog">
        <form method="post" class="logForm">
            <h2 class="h1log">Sign Up</h2>
            <input type="text" name="user_name" class="loginp" placeholder="Username">
            <br>
            <input type="password" name="password" class="passinp" placeholder="Password">
            <br>
            <button type="submit" class="btninp">Sign up</button>
            <a href="login.php" class="create">Already have an account?</a>
        </form>
    </div>
</body>

</html>