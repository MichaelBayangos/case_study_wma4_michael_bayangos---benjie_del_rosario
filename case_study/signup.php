<?php
session_start();
include("database_conn.php");
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

<body class="login_signup_background">
    <div class="loginContainer">
        <form method="post">
            <h2>Sign Up</h2>
            <input type="text" name="user_name" placeholder="Username">
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit">Sign up</button>
            <a href="login.php" class="createAccountText">Already have an account?</a>
        </form>
    </div>
</body>

</html>