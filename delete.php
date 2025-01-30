<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

        $servername = 'localhost';
        $username = "root";
        $password = "";
        $dbname = "mydatabase";

        // Create connection
        $db = new mysqli($servername, $username, $password, $dbname);

        $sql = "DELETE FROM plat WHERE id = $id";
        $db->query($sql);
    }
header("Location: ../Gestionnaire-de-menu/index.php");
exit;
?>
