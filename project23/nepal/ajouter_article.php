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

// Récupération des données du formulaire
$id= $_post['id']; //je n'ai pas sur etre ce qu'il fva etre auto-incrementer ou bien recuperer avec les autres donnees//
$titre = $_POST['titre'];
$contenu = $_POST['contenu'];
$date = date("Y-m-d"); // c'est mieu de changer date_creation avec date
$auteur_id = $_POST["auteur_id"]
$categorie_id = $_POST['categorie_id'];
// Insertion de la ligne dans la table

// Insertion des données dans la table "articles"
$sql = "INSERT INTO articles (id, titre, contenu, date, auteur_id, categorie_id)
VALUES ('$id', '$titre', '$contenu', '$date', '$auteur_id', '$categorie_id')";

if ($conn->query($sql) === TRUE) {
    echo "L'article a été enregistré avec succès.";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}
// Fermeture de la connexion à la base de données
$conn->close();
?>