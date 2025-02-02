<?php
$servername = 'localhost:3306';
$username = 'Dorian';
$password = 'sD&gKlyRdl4w2%1e';
$dbname = "dorian-abbadessa_gestionnaire_de_menu";

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Vérifier la connexion
if (!$db) {
    die("Échec de la connexion : " . $db->connect_error);
}
