<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "gestionnaire_de_menu";

 // Create connection
 $db = new mysqli($servername, $username, $password, $dbname);

$nom = "";
$ingredient = "";
$description = "";
$prix = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    // GET method: Show the data of the client

    if (!isset($_GET["id"])) {
        header("Location: ../Gestionnaire-de-menu/index.php");
        exit;
    }

    $id = $_GET["id"];

    // read the row of the selected "plat" from database table
    $sql = "SELECT * FROM plat WHERE id = $id";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: ../Gestionnaire-de-menu/index.php");
        exit;
    }

    $nom = $row["nom"];
    $ingredient = $row["ingredient"];
    $description = $row["description"];
    $prix = $row["prix"];
}

    else {
        // POST method: Update the data of the client

        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $ingredient = $_POST["ingredient"];
        $description = $_POST["description"];
        $prix = $_POST["prix"];

        do {
            if ( empty($nom) || empty($ingredient) || empty($description) || empty($prix) ) {
                $errorMessage = "Veuillez remplir tous les champs";
                break;
            }

            // update the selected "plat" in the database table
            $sql = "UPDATE plat SET nom = '$nom', ingredient = '$ingredient', description = '$description', prix = '$prix' WHERE id = $id";
            
            $result = $db->query($sql);

            if ( !$result ) {
                $errorMessage = "Erreur lors de la modification du plat";
                break;
            }

            $successMessage = "Plat modifié avec succès";

            header ('Location: ../Gestionnaire-de-menu/index.php');
            exit;

        } while (false);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Plat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nouveau Plat</h2>

        <?php
        if ( !empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

        <form method="post">
            <input type="hidden"  name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nom" value="<?php echo $nom; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Ingredient</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ingredient" value="<?php echo $ingredient; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Prix</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="prix" value="<?php echo $prix; ?>">
                </div>
            </div>

            <?php

            if ( !empty($successMessage) ) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="../Gestionnaire-de-menu/index.php" role="button">Retour</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>