<?php

include("../data/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['pseudo'];
    $pass = $_POST['mdp'];

    // Préparer et exécuter la requête SQL
    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE pseudo = ? AND mdp = ?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    var_dump($_POST);

    if ($result->num_rows > 0) {
        echo "Connexion réussie !";
        header('location: menu.html');

        // Rediriger vers une autre page ou effectuer d'autres actions
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
   
    $stmt->close();
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