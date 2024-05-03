<?php
session_start();

// Check if user is already authenticated
 if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
   header("Location: welcome.php");
exit();
}

// Check if the login form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Simulate authentication (Replace with your own authentication logic)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform authentication check here
    // For example, check against a database of users

    // Simulating successful authentication
    if ($username === 'admin' && $password === '1234') {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['html_views'] = 0;
        $_SESSION['css_views'] = 0;

        // Save username and password as a cookie
        setcookie("username", $username, time() + (86400 * 30), "/"); // Cookie expires in 30 days
        setcookie("password", $password, time() + (86400 * 30), "/"); // Cookie expires in 30 days
       
        header("Location: welcome.php");
        exit();
    } else {
        // Authentication failed
        echo "Invalid username or password. Please try again.";
    }
} elseif (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    // Pre-fill the form with cookie values
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <form method="POST" action="index.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <p>HTML page views: 0</p>
    <p>CSS page views: 0</p>
</body>
</html>
