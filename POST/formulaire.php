<?php
    // $_POST est une superglobale
    // Les superglobales sont des tableaux ARRAY
    // Existe toujours mais vide par défaut est vide
    // $_POST ne peut se remplir que lors de la validation d'un formulaire
    // Plus sécurisé que $_GET car invisible à l'utilisateur à l'inverse de $_GET visible dans l'url
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Formulaire 1</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mt-5 mx-auto">
                <h1 class="text-center mb-4">Exercice POST</h1>
                <?php
                    echo '<pre>';
                    print_r($_POST);
                    echo '</pre>';

                    echo '<pre>';
                    print_r($_GET);
                    echo '</pre>';
                ?>
                <hr>
                <form action="" method="post" enctype="multipart/form-data" class="border p-3">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo" value="" id="pseudo">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="" id="email">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary w-100" id="valider" value="Valider">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>