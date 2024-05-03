<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "websitebbd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupération de l'ID de l'article à modifier
$id = $_GET['id'];

// Récupération des données de l'article à modifier
$sql = "SELECT * FROM articles WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Affichage du formulaire pré-rempli avec les données de l'article
    $row = $result->fetch_assoc();
    echo "<form action='modifier_article_traitement.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
    echo "<label for='titre'>Titre de l'article:</label><br>";
    echo "<input type='text' id='titre' name='titre' value='" . $row['titre'] . "'><br>";
    echo "<label for='contenu'>Contenu de l'article:</label><br>";
    echo "<textarea id='contenu' name='contenu'>" . $row['contenu'] . "</textarea><br>";
    echo "<input type='submit' value='Enregistrer les modifications'>";
    echo "</form>";
} else {
    echo "L'article demandé n'existe pas.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>