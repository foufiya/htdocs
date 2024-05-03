<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $db = new mysqli('localhost', 'root', '', 'test');
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Prepare the SQL statement to retrieve the user's information
    $stmt = $db->prepare("SELECT id, username, password, salt FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // If the user exists in the database, retrieve the stored password and salt
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
        $salt = $row['salt'];

        // Hash the user's input password with the stored salt
        $hashed_password = hash('sha256', $password . $salt);

        // Validate the hashed password against the stored password
        if ($hashed_password === $stored_password) {
            // If the passwords match, set the session variable and redirect to the dashboard
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location: dashboard.php');
            exit;
        } else {
            // If the passwords don't match, set an error message
            $error = 'Invalid username or password';
        }
    } else {
        // If the user doesn't exist in the database, set an error message
        $error = 'Invalid username or password';
    }

    // Close the database connection
    $db->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Status</title>
</head>
<body>
	<?php if (isset($error)): ?>
		<p><?php echo $error; ?></p>
	<?php endif; ?>
</body>
</html>