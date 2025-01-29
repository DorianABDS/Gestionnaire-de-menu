<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "gestionnaire_de_menu";

$db = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($db->connect_error) {
    die("Échec de la connexion : " . $db->connect_error);
}


?>