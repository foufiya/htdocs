<?php
// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=websitebbd", "root", "");

// Récupération des données du formulaire
$titre = $_POST['titre'];
$contenu = $_POST['contenu'];
$cheminFichier = '';

// Traitement de l'image
if(!empty($_FILES['image']['name'])) {
  $nomFichier = $_FILES['image']['name'];
  $cheminFichier = 'images/' . basename($nomFichier);
  move_uploaded_file($_FILES['image']['tmp_name'], $cheminFichier);
}

// Insertion de l'article dans la base de données
$requete = $pdo->prepare("INSERT INTO articles (titre, contenu, image) VALUES (?, ?, ?)");
$requete->execute([$titre, $contenu, $cheminFichier]);

// Redirection vers la page d'accueil
header("Location: index.php");
exit;
?>