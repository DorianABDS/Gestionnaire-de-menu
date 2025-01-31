<?php

include("../data/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['pseudo'];
    $pass = $_POST['mdp'];

    // Préparer et exécuter la requête SQL
    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp");
    $stmt->execute([
        'pseudo' => $user,
        'mdp' => $pass,
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // faire des conditions de vérification du formulaire (bon type de données sur les champs, le mdp securisé ect)
    if ($result) {
        echo "Connexion réussie !";
        session_start();
        $_SESSION["user"] = $result;
        header('location: ../base/menu.php');

        // Rediriger vers une autre page ou effectuer d'autres actions
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

?>
