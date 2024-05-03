<?php
// Connect to the database
@include 'config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the form
$titre = $_POST['titre'];
$auteur = $_POST['auteur'];
$date = $_POST['date'];
$contenu = $_POST['contenu'];

// Insert the data into the database
$sql = "INSERT INTO articles (titre, auteur, date, contenu)
VALUES ('$titre', '$auteur', '$date', '$contenu')";

if ($conn->query($sql) === TRUE) {
    echo "New publication added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>