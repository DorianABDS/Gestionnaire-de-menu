<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "gestionnaire_de_menu";

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Vérifier la connexion
if (!$db) {
    die("Échec de la connexion : " . $db->connect_error);
}
