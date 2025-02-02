<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plats</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2> Plats </h2>
        <a class="btn btn-primary btn-sm" href="../base/nv_plat.php" role="button">Nouveau Plat</a>
        <a class="btn btn-dark btn-sm" href="../base/menu.php" role="button">Accès au menu</a>
         <br>
         <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Ingredient</th>
                    <th>Description</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $servername = 'localhost:3306';
            $username = 'Dorian';
            $password = 'sD&gKlyRdl4w2%1e';
            $dbname = "dorian-abbadessa_gestionnaire_de_menu";

            // Create connection
            $db = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            // read all rows from dbname table
            $sql = "SELECT * FROM plat";
            $result = $db->query($sql);

            if (!$result) {
                die("Query failed: " . $db->error);
            }

            // read data of each row
            while($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>$row[nom]</td>
                    <td>$row[ingredient]</td>
                    <td>$row[description]</td>
                    <td>$row[prix]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='../crud/plat_modifier.php?id=$row[id]'>Modifier</a>
                        <a class='btn btn-danger btn-sm' href='../crud/plat_supprimer.php?id=$row[id]'>Supprimer</a>
                    </td>
                </tr>
                ";
            }
            ?>
            </tbody>
         </table>
    </div>
</body>
</html>