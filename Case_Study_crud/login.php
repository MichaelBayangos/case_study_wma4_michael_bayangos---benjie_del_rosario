<?php
session_start();
include("database.php");
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
                    header("Location: home.php");
                    die;
                } else {
                    echo "<script>alert('Wrong username or password!');</script>";
                }
            } else {
                echo "<script>alert('Enter Invalid username and password!');</script>";
            }
        }
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

<body class="loginbck">
    <div class="divLog">
        <form method="post" class="logForm">
            <h2 class="h1log">Login</h2>
            <input type="text" class="loginp" name="user_name" placeholder="Username">
            <br>
            <input type="password" class="passinp" name="password" placeholder="Password">
            <br>
            <button type="submit" class="btninp" id="btn">Login</button>
            <a href="signup.php" class="create">Create an account</a>
        </form>
    </div>

</body>

</html>