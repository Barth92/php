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

                    // Affichez proprement (avec echo) les informations provenants du form
                    // exemple :
                    // Pseudo : ...
                    // Email : ...
                    // Il faut penser au cas d'erreur possible (est-ce que ça existe !)

                    if(!empty($_POST['pseudo']) && !empty($_POST['email']))
                    {
                        echo 'Votre Pseudo : ' . $_POST['pseudo'] . '<br>';
                        echo 'Votre Email : ' . $_POST['email'] . '<br>';
                        
                        // trim() est une fonction prédéfinie permettant de supprimer les espaces en début et en fin de chaine (pas au milieu de la chaine)
                        $pseudo = trim($_POST['pseudo']);
                        $email = trim($_POST['email']);

                        // Le pseudo doit avoir entre 4 et 14 caractères inclus sinon on affiche un message d'erreur pour l'utilisateur
                        if(iconv_strlen($pseudo) < 4 || iconv_strlen($pseudo) > 14)
                        {
                            echo '<div class="alert alert-danger">⚠ Attention, Le pseudo doit avoir entre 4 et 14 caractères inclus</div>';
                        }
                        else
                        {
                            echo '<div class="alert alert-success mt-3">✅ Pseudo ok !</div>';
                        }

                        // controle sur la validité du format email sinon on affiche un message d'erreur pour l'utilisateur
                        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
                        {
                            echo '<div class="alert alert-danger mt-3">⚠ Attention, le format de votre email n\'est pas valide</div>';
                        }
                        else
                        {
                            echo '<div class="alert alert-success mt-3">✅ Email ok !</div>';
                        }

                    }

                ?>
                <hr>

                    <!-- Attribut du form :
                    ------------------
                    method => La méthode utilisée pour récupérer les données (GET ou POST, si non précisé, c'est GET par défaut)
                    action => l'url cible ou l'on va lors de la validation du form et la ou seront envoyées les données du form
                    enctype = "multipart/form-data" => obligatoire pour récupérer les fichiers dans le cas d'un ou des input de type="file" ($FILES)   
                    
                    Attributs des champs :
                    ----------------------
                    id => pour lier avec le label, pour du css et / ou du js, pour une ancre 
                    name => obmigatoire sur les champs pour récupérer leur données, représente l'indice que l'on retrouvera dans $_GET ou $_POST -->

                <form action="" method="post" enctype="multipart/form-data" class="border p-3">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo" value="" id="pseudo">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="" id="email" required="required">
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