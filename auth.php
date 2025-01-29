<?php
include 'db.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["submit"])) {

        if (!empty($_POST["pseudo"]) && !empty($_POST["mdp"])) {
            $pseudo = htmlspecialchars($_POST["pseudo"]);
            $mdp = password_hash(htmlspecialchars($_POST["mdp"]), PASSWORD_DEFAULT);

            $stmt = $db->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp");
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->bindParam(':mdp', $mdp);
            $stmt->execute();
        
            $query = $stmt->fetch();

            var_dump($_POST);
    
            $req = $db->prepare("INSERT INTO utilisateur (pseudo, mdp) VALUES (:pseudo, :mdp)");
            $req->execute(array(
                'pseudo' => $pseudo,
                'mdp' => $mdp
            ));
    
            echo 'Vous êtes bien inscrit';
            header("Location: menu.html");
            exit();
        } else {
            echo 'Identifiants incorrects';
        }
    }
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
        <label for="pseudo">Nom d'utilisateur:</label>
        <input type="text" id="pseudo" name="pseudo" required><br><br>
        
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required><br><br>
        
        <input type="submit" value="Se connecter">
    </form>

    </body>
</html>