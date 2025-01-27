<?php
include 'db.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pseudo = $_POST['pseudo'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    echo 'connecte';

    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp");
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':mdp', $mdp);
    $stmt->execute();

    $query = $stmt->fetchAll();
    
    echo 'Connecté';
        // Rediriger vers une page protégée ou d'accueil
        header("Location: accueil.php");
        exit();
    } else {
        echo 'Identifiants incorrects.';
    
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire de Connexion</title>
    </head>
    <body>

    <h2>Formulaire de Connexion</h2>
    <form method="POST">
        <label for="username">Nom d'utilisateur:</label>
        <input type="$_POST" id="pseudo" name="pseudo" required><br><br>
        
        <label for="password">Mot de passe:</label>
        <input type="$_POST" id="mdp" name="mdp" required><br><br>
        
        <input type="submit" value="Se connecter">
    </form>

    </body>
</html>