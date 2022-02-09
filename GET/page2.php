<?php
    // la manipulation de l'url est protocole HTTP nommé GET
    // GET représente l'url de la page
    // L'outil PHP correspondant : $_GET
    // $_GET est une superglobale (disponible dans l'environnement global et local naturellement)
    // Les superglobales sont des tableaux ARRAY

    // $_GET est un tableau array vide par défaut, en revanche si des informations sont présentes avec la bonne syntaxe dans l'url, on les retrouve naturellement dans $_GET
    // $_GET est lié à un protocole HTTP donc existe toujours mais par défaut est vide
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1</title>
    <style>
        .conteneur { width: 1000px; margin: 0 auto; padding: 20px; border: 1px solid; }
        h1 { background: steelblue; padding: 20px; color: white; }
    </style>

</head>
<body>

<div class="conteneur">
    <h1>Exercice GET Page 2</h1>
    <a href="page1.php">Retour à la page 1</a>
    <hr>
    <?php
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';

        // Affichez proprement la valeur dans $_GET (avec un echo et pas un print_r/var_dump)
        if(isset($_GET['categorie']) && isset($_GET['taille']) && isset($_GET['couleur']) && isset($_GET['prix']))
        {
            echo 'Vous avez choisi la catégorie : ' . $_GET['categorie'] . '<hr>';
            echo 'Vous avez choisi la Taille : ' . $_GET['taille'] . '<hr>';
            echo 'Vous avez choisi la Couleur : ' . $_GET['couleur'] . '<hr>';
            echo 'Le prix de cette article est de  : ' . $_GET['prix'] . ' €<hr>';
        }
        else
        {
            echo 'Veuillez choisir une catégorie depuis la page 1<hr>';
        }

    ?>
    
</div>
</body>
</html>
