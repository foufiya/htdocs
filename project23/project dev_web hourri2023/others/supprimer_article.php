<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "websitebbd";

$conn = new mysqli($servername, $username, $password, $dbname);
// Voici la suite du code PHP pour la suppression d'un article: 
// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
    }
    
    // Récupération de l'ID de l'article à supprimer
    $id = $_GET['id'];
    
    // Suppression de l'article à partir de l'ID
    $sql = "DELETE FROM articles WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
    echo "L'article a été supprimé avec succès.";
    } else {
    echo "Erreur lors de la suppression de l'article: " . $conn->error;
    }
    
    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>