<?php
include 'db.php';

session_start();

function CheckUserExist($pseudo, $mdp) {
    try {
        $sql1 = "SELECT * FROM utilisateur WHERE pseudo = :pseudo";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute(array(':pseudo' => $pseudo));
        echo "La connexion à la base de données est réussie.";
    }
    catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    }
    if ($stmt1->rowCount() === 1) {
        $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    

        if ($mdp) {
            $sql2 = "SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute(array(':pseudo' => $pseudo, ':mdp' => $mdp));
        }
         
    }
}

if (isset($_POST['submit'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        if (CheckUserExist($_POST['pseudo'], $_POST['mdp'])) {
            header('location: menu.html');
            exit(); // arrêter l'exécution du script
            } 
        else {
            echo 'non connecté';
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
    <form action="" method="POST">
        <label for="pseudo">Nom d'utilisateur:</label>
        <input type="text" id="pseudo" name="pseudo" required><br><br>
        
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required><br><br>
        
        <input type="submit" name="submit" value="Se connecter">
    </form>

    </body>
</html>