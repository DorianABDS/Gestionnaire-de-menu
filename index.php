<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plats</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2> Plats </h2>
        <a class="btn btn-primary" href="" role="button">Plats</a>
         <br>
         <table class="table">
            <tread>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </tread>
            <tbody>
                <?php
                include 'db.php';
                ?>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href="/modifier.php">Modifier</a>
                        <a class='btn btn-danger btn-sm' href="/supprimer.php">Supprimer</a>
                    </td>
                </tr>
            </tbody>
         </table>
    </div>
</body>
</html>