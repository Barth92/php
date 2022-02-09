<?php

// 01 - récupérez 5 images sur le web de même extension et les renommer de cette manière :
// image1.jpg / image2.jpg / image3.jpg / image4.jpg / image5.jpg     //
// 02 - Affichez la première image avec un echo et une balise img src //
// 03 - Affichez 5 fois la même image toujours avec un seul echo et une seule balise img src dans le code //
// 04 - Affichez les 5 différentes images toujours avec un seul echo et une seule balise img src dans le code //
// BONUS : Affichez les 5 différentes images toujours avec un seul echo et une seule balise img src sans connaitre leur nom ! (pensez au constante magique + fonction prédéfinie scandir() )

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice Images</title>
    <style>
        *{box-sizing: border-box;}
        .conteneur{width: 1000px; margin: 0 auto; padding: 20px; border: 1px solid #dedede; display: flex; flex-wrap: wrap; justify-content: space-between;}
        img{width: 45%; margin-top: 20px;}
    </style>
</head>
<body>

    <div class="conteneur">
        <?php
            echo '<img src="img/image1.jpg" alt="une image de chat">';
        ?>
    </div>

    <div class="conteneur">
        <?php
            for($i = 0; $i < 5; $i++)
            {
                echo '<img src="img/image2.jpg" alt="une image de chat">';
            }
        ?>
    </div>

    <div class="conteneur">
        <?php
            for($i = 1; $i <= 5; $i++)
            {
                echo '<img src="img/image' . $i . '.jpg" alt="une image">';
            }
        ?>
    </div>

    <div class="conteneur">
            <?php
                $liste_image = scandir(__DIR__ . '/img');

                // echo '<pre>';
                // print_r($liste_image);
                // echo '</pre>';

                foreach($liste_image as $src)
                {
                    $src = strtolower($src);
                    if(strpos($src, 'jpg') !== false || strpos($src, 'png') !== false || strpos($src, 'gif') !== false)
                    {
                        echo '<img src="img/' . $src . '" alt="une image">';
                    }
                }
            ?>
    </div>
    
</body>
</html>