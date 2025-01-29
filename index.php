<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plats</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2> Plats </h2>
        <a class="btn btn-primary" href="../Gestionnaire-de-menu/nv_plat.php" role="button">Nouveau Plat</a>
         <br>
         <table class="table">
            <tread>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>ingredient</th>
                    <th>description</th>
                    <th>prix</th>
                </tr>
            </tread>
            <tbody>
            <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = "gestionnaire_de_menu";

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
                    <td>$row[id]</td>
                    <td>$row[nom]</td>
                    <td>$row[ingredient]</td>
                    <td>$row[description]</td>
                    <td>$row[prix]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='../Gestionnaire-de-menu/modifier.php?id=$row[id]'>Modifier</a>
                        <a class='btn btn-danger btn-sm' href='../Gestionnaire-de-menu/supprimer.php?id=$row[id]'>Supprimer</a>
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