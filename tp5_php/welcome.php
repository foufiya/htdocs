<?php
session_start();

// Check if user is authenticated, if not redirect to login page
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: index.php");
    exit();
}

//Increment HTML page views counter
$_SESSION['html_views'] += 1;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>This is the HTML page.</p>
    <p>Number of views: <?php echo $_SESSION['html_views']; ?></p>
    <p><a href="index.php">Logout</a></p>
</body>
</html>
