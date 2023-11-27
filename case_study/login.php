<?php
session_start();
include("database_conn.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        $sql = "SELECT * FROM users WHERE user_name = '$user_name' Limit 1 ";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        } else {
            echo "wrong username or password";
        }
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
    <title>Login</title>
</head>

<body class="login_signup_background">
    <div class="loginContainer">
        <form method="post">
            <h2>Login</h2>
            <input type="text" name="user_name" placeholder="Username">
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit">Login</button>
            <a href="signup.php" class="createAccountText">Create an account</a>
        </form>
    </div>

</body>

</html>