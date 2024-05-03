<?php
// Connexion à la base de données
$servername = "localhost";
$username = "nom_utilisateur";
$password = "mot_de_passe";
$dbname = "websitebbd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
  die("La connexion à la base de données a échoué: " . $conn->connect_error);
} 

// Récupération des données du formulaire
$id= $_post['id'];
$nom= $_POST['nom'];
$email= $_POST['email'];
$mot_de_passe= $_POST['mot_de_passe' ];

// Insertion des données dans la table "utilisateurs"
$sql = "INSERT INTO utilisateurs (id, nom, email, mot_de_passe)
VALUES ('$id', '$nom', '$email', '$mot_de_passe')";

if ($conn->query($sql) === TRUE) {
    echo "Les données ont été enregistrées avec succès.";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}
// Fermeture de la connexion à la base de données
$conn->close();



$name = $_POST['name'];
$mot_de_passe = $_POST['mot_de_passe'];

// Vérifier les informations de login
if ($name == 'admin' && $mot_de_passe == 'mot_de_passe123') {
  // Autoriser l'accès
  $_SESSION['name'] = $name;
  header('Location: dashboard.php');
  exit;
} else {
  // Refuser l'accès
  header('Location: login.php?error=1');
  exit;
}

?>

<?php
session_start(); // démarrer la session

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit;
}

// Afficher la page protégée
echo 'Bienvenue sur la page protégée, ' . $_SESSION['username'] . '!';
?>