<?php

// Les cookies de ce serveur sont disponible dans la superglobale $_COOKIE
if(isset($_GET['langue'])) // si l'indice langue existe dans la superglobale $_GET (si l'utilisateur a cliqué sur un des liens)
{
    $langue = $_GET['langue'];
}
elseif(isset($_COOKIE['lang'])) // si l'indice lang existe dans la superglobale $_COOKIE (un cookie existe déjà sur le navigateur utilisateur)
{
    $langue = $_COOKIE['lang'];
}
else // sinon la langue par défaut est français !
{
    $langue = 'fr';
}


// pour conserver le choix de l'utilisateur, nous allons créer un cookie sur le navigateur utilisateur afin de pouvoir l'interroger lors de ses prochaines visites.
// setcookie('son_nom', 'sa_valeur', 'duree_de_vie')
// si l'information duree_de_vie n'est pas présente, le cookie sera supprimé tout de suite lorsque le navigateur est fermé
$un_an = 365*24*3600;
setcookie('lang', $langue, time() + $un_an);
// Pour supprimer un cookie : on donne une durée de dépassée
// setcookie('lang', $langue, time() - 1)


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .conteneur {
            width: 1000px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid;
        }

        h1 {
            background: steelblue;
            padding: 20px;
            color: white;
        }
    </style>
    <title>COOKIE</title>
</head>

<body>

    <div class="conteneur">
        <h1>Veuillez choisir une langue</h1>
        <ul>
            <li><a href="?langue=fr">Français</a></li>
            <li><a href="?langue=es">Espagnol</a></li>
            <li><a href="?langue=it">Italien</a></li>
            <li><a href="?langue=en">Anglais</a></li>
            <li><a href="?langue=de">Allemand</a></li>
        </ul>

        <?php
            if($langue == 'fr')
            {
                echo '<p>Bonjour, <br> Vous visitez actuellement le site en Français. <br>Effectivement, la sauvegarde du cookie permet de retenir la langue avec laquelle vous naviguer sur le site pour vos prochaines visites. <br>A bientôt. </p>';
            }
            elseif($langue == 'es')
            {
                echo '<p>Hola, <br> En este momento està visitando el sitio en Espanol. <br> De hecho, la cookie permite la copia de seguridad de conservar el idioma que utilice el sitio para futuras visitas. <br> Pronto.</p>';
            }
            elseif($langue == 'it')
            {
                echo '<p>Ciao <br>Si sta attualmente visitando il sito in Italiano <br>Infatti, il cookie consente il backup di mantenere la lingua che si usa il sito per visite future. <br>Presto.</p>';
            }
            elseif($langue == 'en')
            {
                echo '<p>Hello <br>You are currently visiting the site in English <br>Indeed, the cookie allows the backup to retain the language that you use the site for future visits. <br>Soon.</p>';
            }
            elseif($langue == 'de')
            {
                echo '<p>Hallo,<br> Sie besuchen gerade die Website auf Französisch. Durch das Speichern des Cookies können Sie sich die Sprache merken, mit der Sie die Website für Ihre nächsten Besuche besuchen. <br>Bis bald.</p>';
            }
        ?>
    </div>
</body>
</html>