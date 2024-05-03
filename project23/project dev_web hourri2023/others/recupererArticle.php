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

// Récupération des données de la table "articles"
$sql = "SELECT * FROM articles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichage des données de chaque article
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["titre"] . "</h2>";
        echo "<p>" . $row["contenu"] . "</p>";
        echo "<p>" . $row["date"] . "</p>";
        echo "<a href='modifier_article.php?id=" . $row["id"] . "'>Modifier</a> ";
        echo "<a href='supprimer_article.php?id=" . $row["id"] . "'>Supprimer</a><br><br>";
    }
} else {
    echo "Aucun article trouvé.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>