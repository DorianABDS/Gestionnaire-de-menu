<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = 'localhost:3306';
    $username = 'Dorian';
    $password = 'sD&gKlyRdl4w2%1e';
    $dbname = "dorian-abbadessa_gestionnaire_de_menu";

 // Create connection
 $db = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM menu WHERE id = $id";
    $db->query($sql);
}
header("Location: ../base/menu.php");
exit;
?>