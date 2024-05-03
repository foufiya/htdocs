<?php

if (isset($_POST['vote'])) {
    
    $selectedOption = $_POST['vote'];

    // Check if the user has already voted
    if (isset($_COOKIE['voted'])) {
        $previousVote = $_COOKIE['voted'];
        
        // Check if the user has voted for the same option before
        if ($previousVote === $selectedOption) {
            echo "You have already voted for " . $selectedOption;
        } else {
            echo "You have already voted for " . $previousVote;
        }
    } else {
        // Set the cookie to mark that the user has voted
        setcookie('voted', $selectedOption, time() + 120); // Expires after 2 minutes 120 seconde

        echo "Thank you for your vote!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Poll</title>
</head>
<body>
    <h3> Vote for your favourite internet technology:</h3>
    <form method="post" action="vote.php">
        <input type="radio" name="vote" value="PHP/MySQL"> PHP/MySQL<br>
        <input type="radio" name="vote" value="ASP.net"> ASP.net<br>
        <input type="radio" name="vote" value="JSP"> JSP<br>
        <input type="submit" value="Vote">
    </form>
</body>
</html>
