<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrainement PHP</title>
    <style>
        h2 {
            background-color: steelblue;
            padding: 20px;
            color: white;
        }

        .conteneur {
            max-width: 1200px;
            padding: 20px;
            border: 1px solid #dedede;
            margin: 0 auto;
        }
    </style>
</head>
<body>

        <div class="conteneur">
            <h2>Entrainement PHP</h2>

                <?php

                // commentaire PHP sur une seule ligne
                # commentaire PHP sur une seule ligne
                
                /*
                commentaire
                sur
                plusieurs
                lignes
                */

                // Liens utiles :
                // https://www.php.net/   documentation officielle de php 
                // https://stackoverflow.com/

                /*
                SOMMAIRE :
                ---------

                -01 - Instruction d'affichage
                -02 - variables : déclaration / affectation / type
                -03 - Concaténation
                -04 - Guillemets & quotes
                -05 - Constantes & constantes magiques
                -06 - Conditions & opérateurs de comparaison
                -07 - Fonctions prédéfinies
                -08 - Fonctions utilisateurs
                -09 - Boucles
                -10 - Inclusion
                -11 - Tableaux de données ARRAY
                -12 - CLasses & Objets

                */

                echo '<h2>01 - Instruction d\'affichage</h2>';
                // echo est une instruction permettant de déclencher un affichage (une écriture dans le code source)
                // Chaque instruction doit se terminer par un point virgule ;
                
                echo 'Bonjour'; // il est possible d'afficher du texte
                echo '<br>';    // il est également possible d'afficher de l'html
                echo 'à tous ! <br>';

                print 'Nous sommes Lundi ! <br>'; // print est une autre instruction d'affichage quasiment similaire à echo.
                // Dans le cadre de ce cours, nous utiliserons toujours echo !


                // La ligne suivante est la fermeture de la balise PHP
                ?>

                <?= 'Cette balise php contient un echo et ne sert que lorsque l\'on souhaite déclencher un affichage'; ?> 
                
                <?php

                echo '<h2>02 - Variables : type / déclaration / affectation</h2>';
                // définition : une variable est un espace nommé permettant de conserver une valeur
                // une variable en php est déclaré avec le signe $
                // PHP est sensible à la casse, la variable $A n'est pas la même que la variable $a
                // Caractère autorisés : a-z A-Z 0-9 _
                // ⚠ Attention, une variable ne peut pas commencer par un chiffre

                $a = 123; // déclaration de la variable nommée "a" et affectation de la valeur numérique 123
                // gettype() est une fonction prédéfinie permettant de connaître le type d'une valeur
                echo gettype($a); // integer : un entier
                echo '<br>';

                $a = 1.5; // chiffre décimal
                echo gettype($a); // double (float) : chiffre décimal
                echo '<br>';

                $a = 'une chaine de caractère'; // une chaine de caractère
                echo gettype($a); // string
                echo '<br>';

                $b = '123'; 
                echo gettype($b); // string
                echo '<br>';

                $c = true; // ou TRUE ou FALSE
                echo gettype($c); // boolean ( true à la valeur 1 et false à la valeur 0)
                echo '<br>';

                separateur();

                echo '<h2>03 - Concaténation </h2>';
                // La concaténation permet d'assembler des chaines de caractères les une avec les autres. (raccourci d'écriture)

                $x = 'Bonjour';
                $y = 'tout le monde !';

                // sans la concaténation
                echo $x;
                echo ' ';
                echo $y;
                echo '<br>';

                // avec la concaténation
                echo $x . ' ' . $y . '<br>';

                // La concaténation se fait avec le "." que l'on peur traduire par "suivi de"
                // il est possible de faire la concaténation avec la virgule ",", mais à éviter car ne fonctionne pas si on utilise print !!
                // Pour se protéger autant utiliser toujours point !

                // concaténation lors de l'affectation :

                $prenom1 = 'Robert';
                $prenom1 = 'Georges';

                echo $prenom1 . '<br>';

                $prenom2 = 'Robert';
                $prenom2 .= ' Georges'; // Robert Georges // raccourci équivalent à écrire : $prenom2 = $prenom2 . ' Georges';

                echo $prenom2 . '<br>';

                echo '<h2>04 - Guillemets & apostrophes</h2>';

                $pseudo = 'Admin';

                // Dans des apostrophes, une variable est considérée comme du texte
                // Dans des guillemets, une variable est reconnue et donc interprétée !

                echo 'Bonjour ' . $pseudo . '<br>'; 

                echo 'Bonjour $pseudo <br>';
                echo "Bonjour $pseudo <br>";

                echo '<h2>05 - Constantes & constantes magiques</h2>';

                // Une constante est comme une variable sauf que comme son nom l'indique, on ne pourra pas changer la valeur pendant l'exécution du code.
                // Très pratique pour isoler une information et l'appeler dans notre code partout ou cela est nécessaire

                // Par convention, une constante s'écrit en majuscule

                // déclaration et affectation
                // define(SON_NOM, sa_valeur)
                define('CAPITALE', 'Paris'); 
                
                echo CAPITALE;
                echo '<br><br>';

                // Constantes magiques : (déjà inscrite dans le langage)
                //-------------------

                echo __FILE__ . '<br>'; // le chemin du fichier actuel
                echo __LINE__ . '<br>'; // le numéro de la ligne
                echo __DIR__ . '<br>';  // jusqu'au dossier qui contient le fichier 

                echo '<h2>Exercice variables</h2>';
                // créer 3 variables et placez dans chacune une des valeurs suivantes : bleu, blanc, rouge
                // ensuite via un seul echo, il faut afficher en utilisant les variables la chaine suivante :
                // bleu - blanc - rouge

                $a = "bleu";
                $b = "blanc";
                $c = "rouge";
                $tiret = ' - ';

                echo $a . ' - ' . $b . ' - ' . $c . '<br>';
                echo $a . $tiret . $b . $tiret . $c . '<br>';
                echo "$a $tiret $b $tiret $c <br>";

                echo '<h2>Opérateurs arithmétique</h2>';

                $valeur1 = 10;
                $valeur2 = 2;

                echo $valeur1 + $valeur2 . '<br>'; // 12 // addition
                echo $valeur1 - $valeur2 . '<br>'; // 8 // soustraction
                echo $valeur1 / $valeur2 . '<br>'; // 5 // division
                echo $valeur1 * $valeur2 . '<br>'; // 20 // multiplication
                echo $valeur1 % $valeur2 . '<br>'; // 0  // modulo // Le restant de la division en terme d'entier
                echo $valeur1 ** $valeur2 . '<br>'; // 100 // puissance

                // raccourci d'écriture
                // opération / affection

                $valeur1 += $valeur2; // équivalent à écrire : $valeur1 = $valeur1 + $valeur2
                $valeur1 -= $valeur2; // équivalent à écrire : $valeur1 = $valeur1 - $valeur2
                $valeur1 /= $valeur2; // équivalent à écrire : $valeur1 = $valeur1 / $valeur2
                $valeur1 *= $valeur2; // équivalent à écrire : $valeur1 = $valeur1 * $valeur2
                $valeur1 %= $valeur2; // équivalent à écrire : $valeur1 = $valeur1 % $valeur2
                $valeur1 **= $valeur2; // équivalent à écrire : $valeur1 = $valeur1 ** $valeur2

                echo '<h2>06- Conditions & opérateurs de comparaison</h2>';
                // isset() / empty()
                // isset() permet de savoir si une information existe (est définie)
                // empty() permet de savoir si une information n'existe pas ou si elle existe mais vide (information vide : exemple : une chaine vide, false, 0)

                // isset()
                $abc = 'bonjour';
                echo $abc . '<br>';
                echo $def . '<br>'; // erreur car non définie

                if(isset($def))
                {
                    echo $def . '<br>';
                }
                else
                {
                    echo 'Cette variable n\'existe pas <br>';
                }

                // isset() ou empty() seront obligatoire dans le cas ou l'on manipule une information provenant de l'utilisateur (formulaire / url / cookie)

                // empty()
                // empty() renvoie true si la variable n'existe pas ou si elle existe mais vide (exemple un champ de formulaire avec aucune saisie : l'information existe mais vide)
                // valeurs vides : une chaine vide '', 0, tableau array vide, la chaine '0' et false lui même.
                $pseudo = '';
                if(empty($pseudo))
                {
                    echo 'La variable $pseudo n\'existe pas ou existe mais contient une valeur considérée comme vide<br>';
                }
                else
                {
                    echo 'La variable existe et n\'est pas vide<br>';
                }

                // if / elseif / else
                $a = 10; $b = 5; $c = 2;

                // créer un conditionnement a > b

                if($a > $b)
                {
                    echo 'La valeur de la variable a est bien supérieur à la valeur de la variable b<br>';
                }
                else
                {
                    echo 'a n\'est pas supérieur à b<br>';
                }

                // plusieurs conditions : AND => &&
                // l'une ou l'autre d'un ensemble de condition : OR => ||

                if($a > $b && $b > $c)
                {
                    echo 'Ok pour les conditions<br>';
                }

                if($a > $b || $a == 20)
                {
                    echo 'Ok pour au moins une des conditions<br>';
                }

                if($a == 8) // false
                {
                    echo 'Réponse 1<br>';
                }
                elseif($a != 10) // false
                {
                    echo 'Réponse 2<br>';
                }
                elseif($c == 12) // false    
                {
                    echo 'Réponse 3<br>';
                }
                else // jamais de parenthèse sur un else 
                {
                    echo 'Réponse 4<br>';
                }




                /*
                Opérateur de comparaison            
                -----------------------
                =           Affection ⚠ Attention ! Ce n'est pas un opérateur de comparaison
                ==          est égal à (en terme de valeur uniquement)
                ===         est strictement égal à (comparaison stricte : on compare les valeurs et les types)
                !=          est différent de (en terme de valeur uniquement)
                !==         est strictement différent de (en terùe de valeur et/ou de type)
                >           est strictement supérieur
                <           est strictement inférieur
                >=          supérieur ou égal
                <=          inférieur ou égal

                */

                $a1 = 1;
                $a2 = '1';

                echo '<hr>';

                if($a1 == $a2)
                {
                    echo 'Ok, les deux variables contiennent la même valeur<br>';
                }
                else
                {
                    echo 'NOK, les valeurs sont différentes<br>';
                }

                // Autre écriture possibles :

                if($a1 === $a2)
                    echo 'Ok, les deux variables contiennent la même valeur du même type<br>';
                else
                    echo 'NOK, les valeurs et / ou les types sont différents<br>';
                    
                // : end
                if($a1 === $a2) :
                    echo 'OK, les deux variables contiennent la même valeur du même type<br>';
                else :
                    echo 'NOK, les valeurs et / ou les types sont différents<br>';
                endif;

                // ecriture ternaire
                // action ... condition ... if ... else
                echo ($a1 === $a2) ? 'OK, les deux variables contiennent la même valeur du même type<br>' : 'NOK, les valeurs et / ou les types sont différents<br>';
                
                // Condition switch()
                $couleur = 'jaune';

                switch($couleur)
                {
                    case 'bleu' :
                        echo 'Vous aimez le bleu<br>';
                    break;
                    case 'vert' :
                        echo 'Vous aimez le vert<br>';
                    break;
                    case 'rouge' :
                        echo 'Vous aimez le rouge<br>';
                    break;
                    default :
                        echo 'Vous n\'aimez pas le bleu, pas le rouge ni le vert<br>';
                    break;
                }

                // Exercice : refaire cette condition en utilisant if

                $couleur = 'bleu';

                if($couleur == 'vert')
                {
                    echo 'Vous aimez le vert<br>';
                }
                elseif($couleur == 'rouge')
                {
                    echo 'Vous aimez le rouge<br>';
                }
                elseif($couleur == 'bleu')
                {
                    echo 'Vous aimez le bleu<br>';
                }
                else
                {
                    echo 'Vous n\'aimez pas le bleu, pas le rouge ni le vert<br>';
                }

                echo '<h2>07 - Fonctions prédéfinies</h2>';
                // déjà inscrite au langage, le développeur ne fait l'exécuter.

                // fonction date()
                // permet de formater une date selon un format donné
                // https://www.php.net/manual/fr/function.date.php
                // Pour les formats disponibles : 
                // https://www.php.net/manual/fr/datetime.format.php

                echo 'Nous sommes le : ' . date('d/m/Y à H:i:s') . '<hr>';

                // fonction de traitement de chaine de caractère
                // strpos()
                // strpos(ou_on_cherche, ce_que_lon_cherche)
                
                $email = 'exemple@gmail.com'; // nous allons chercher le @ dans cette chaine de caractère

                echo strpos($email, '@') . '<hr>'; // affiche : 7. ⚠ Attention, le premier caractère à la position 0 !
                
                // valeurs de retours
                    // Succès : on obtient un entier INT représentant la position
                    // Echec  : on obtient false

                // strlen()
                // strlen() permet de compter le nombre de caractère dans une chaine ( en terme d'octets, les caractères spéciaux valent plus d'un octet)
                // strlen(la_chaine_concernee)

                $pseudo = 'Admin';
                echo 'Taille de la chaine contenue dans la variable pseudo : ' . strlen($pseudo) . '<hr>';
                
                $test = 'é';
                echo 'Taille de la chaine contenue dans la variable test : ' . strlen($test) . '<hr>';
                
                // Pour la gestion de l'utf-8 et les caractères spéciaux, il faut privilégier la fonction iconv_strlen()
                // iconv_strlen() on compte réellement le nb de caractère
                echo 'Avec iconv_strlen() : <br>';
                $pseudo = 'Admin';
                echo 'Taille de la chaine contenu dans la variable pseudo : ' . iconv_strlen($pseudo) . '<hr>'; 
                
                $test = 'é';
                echo 'Taille de la chaine contenue dans la variable test : ' . iconv_strlen($test) . '<hr>';

                // substr
                // permet de découper une chaine.
                // substr(chaine, position_depart, nb_de_caractere)
                $texte = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis dolorum explicabo velit odio minima, eos ipsam sit optio quisquam neque quia? Quo sequi ad ipsam a excepturi autem quam quae!
                Asperiores facere ipsum ratione suscipit cupiditate sapiente, atque voluptatem cum placeat provident, sint esse voluptatum ad et! Deleniti possimus, ad odit labore voluptas numquam animi ipsa, dolorum molestias adipisci vero.';

                echo substr($texte, 0, 200) . '...<a href="">Lire la suite</a>';

                echo '<h2>08 - Fonction utilisateur</h2>';
                // déclarée et exécutée par le développeur
                // il est possible d'exécuter une fonction avant sa déclaration (ce qui n'est pas le cas pour une variable)
                // c'est possible car l'interpréteur php va faire deux lectures du code
                // une première lecture pour isoler toutes les fonctions et les pré charger 
                // une deuxième lecture pour exécuter tout le code


                // déclaration : 
                function separateur()
                {
                    echo '<hr><hr><hr>';
                }

                // exécution :
                separateur();

                // fonction avec argument
                // un arguement (parameter) est fourni à une fonction afin de permettre de modifier le comportement de la fonction

                function dire_bonjour($qui)
                {
                    return 'Bonjour ' . $qui . ', bienvenue sur notre site<br>';
                }

                // avec un return, nous devons mettre un echo si on souhaite un affichage
                // si un argument est attendu, il est obligatoire de le fournir sinon erreur php
                echo dire_bonjour('Julien');
                echo dire_bonjour('Elodie');
                echo dire_bonjour('Florian');

                $pseudo = 'Tintin09';
                echo dire_bonjour($pseudo);

                // Fonction pour calculer la TVA sur une valeur

                function calcul_tva($valeur)
                {
                    return $valeur * 1.2;
                }

                echo '1000 avec une tva de 20% = ' . calcul_tva(1000) . '€<hr>';

                // Pour améliorer cette fonction, il faudrait permettre de choisir aussi le taux tva afin que ce ne soit pas toujours 20%

             

                function calcul_tva_taux($valeur, $taux)
                {
                    return $valeur * $taux;
                }

                echo '1000 avec un taux de tva de 20% = ' . calcul_tva_taux(1000, 1.2) . '€<hr>';
                echo '1000 avec un taux de tva de 5.5% = ' . calcul_tva_taux(1000, 1.055) . '€<hr>';
                

                // La même fonction avec $taux en argument facultatif
                function calcul_tva_taux2($valeur, $taux = 1.2)
                {
                    return $valeur * $taux;
                }
                
                echo '1000 avec un taux de tva de 20% = ' . calcul_tva_taux2(1000) . '€<hr>';
                echo '1000 avec un taux de tva de 5.5% = ' . calcul_tva_taux2(1000, 1.055) . '€<hr>';

                $taux = 1.2;  
                echo gettype($taux);
                
                separateur();

                // Environnement (scope)
                // Gobal : le script complet
                // Local : à l'intérieur des accolades d'une fonction
                // L'existence des variables va dépendre de l'environnement ou elle est déclarée

                $animal = 'chat';

                function foret()
                {
                    $animal = 'loup';
                    return "J'ai du un $animal en forêt<br>";
                }

                echo $animal . '<hr>'; // chat

                echo foret(); // loup

                separateur();

                $pays = 'France'; // espace global

                function affiche_pays()
                {
                    global $pays; // Le mot clé global permet d'aller chercher la variable dans l'espace global
                    return "J'habite en $pays <hr>";
                }

                echo affiche_pays();

                // Exercice : 
                // Si la saison est printemps on utilise "au", si la température est comprise entre -1 et 1 on affiche "degré"


                function meteo($saison, $temperature)
                {
                    if($saison == 'printemps')
                    {
                        $debut = 'Nous sommes au ' . $saison;
                    }
                    else
                    {
                        $debut = 'Nous sommes en ' . $saison;
                    }

                    if($temperature <= 1 && $temperature >= -1)
                    {
                        $suite = ', et il fait ' . $temperature . ' degré<hr>';
                    }
                    else
                    {
                        $suite = ', et il fait ' . $temperature . ' degrés<hr>';
                    }

                    return $debut . $suite;

                }
                

                echo meteo('été', 30);
                echo meteo('hiver', 0);
                echo meteo('automne', 5);
                echo meteo('printemps', 15);
                echo meteo('printemps', -1);
                
                separateur();
                
                function meteo2($saison, $temperature)
                {
                    $article = 'en';
                    $s = 's';
                    
                    if($saison == 'printemps')
                    {
                        $article = 'au';
                    }

                    if($temperature >= -1 && $temperature <= 1)
                    {
                        $s = '';
                    }
                    
                    return 'Nous sommes ' . $article . ' ' . $saison . ', et il fait ' . $temperature . ' degré' . $s . '<hr>';
                }
                
                echo meteo2('été', 30);
                echo meteo2('hiver', 0);
                echo meteo2('automne', 5);
                echo meteo2('printemps', 15);
                echo meteo2('printemps', -1);
                
                separateur();
                
                function meteo3($saison, $temperature)
                {
                    $debut = ($saison == 'printemps') ? 'Nous sommes au ' . $saison : 'Nous sommes en ' . $saison;
                    $suite = ($temperature >= -1 && $temperature <=1) ? ', et il fait ' . $temperature . ' degré<hr>' : ', et il fait ' . $temperature . 'degrés<hr>';
                    
                    return $debut . $suite;
                }
                
                echo meteo3('été', 65);
                echo meteo3('hiver', -1);
                echo meteo3('automne', 1);
                echo meteo3('printemps', 10);
                echo meteo3('printemps', 0);

                echo '<h2>09 - Structure itérative : Boucles</h2>';
                // Une boucle est un outil nous permettant de répéter un ensemble d'instruction

                // pour mettre en place une boucle, nous avons besoin de 3 informations :
                        // 01 - une valeur de départ (compteur)
                        // 02 - une condition d'entrée (une question)
                        // 03 - une incrémentation ou décrémentation pour modifier la valeur du compteur afin de ne pas avoir une boucle infinie
                
                // boucle while()
                $i = 0;          // compteur
                while($i < 10)   // condition
                {
                    echo $i;     // instruction
                    $i++;        // incrémentation // $i = $i + 1 // $i += 1
                }

                separateur();

                // boucle for()
                // for(valeur_depart; condition; incrementation)
                for($i = 0; $i < 10; $i++)
                {
                    echo $i;
                }

                echo '<hr>';



                // faire en sorte de ne pas avoir le dernier - après le chiffre 9
                // 0 - 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9

                for($i = 0; $i < 10; $i++)
                {
                    if($i == 9)
                    {
                        echo $i;
                    }
                    else
                    {
                        echo $i . ' - ';
                    }
                }

                separateur();

                $i = 0;
                while($i < 10)
                {
                    if($i < 9)
                    {
                        echo $i . ' - ';
                    }
                    else
                    {
                        echo $i;
                    }
                    $i++;
                }

                separateur();

                // Affichage de 0 à 9 dans un tableau html

                echo '<table border="1" style="border-collapse: collapse; width: 50%; margin: 0 auto; text-align: center;">';
                echo '<tr>';

                $i = 0;
                while($i < 10)
                {
                    echo '<td style="padding: 10px;">' . $i . '</td>';
                    $i++;
                }

                echo '</tr>';
                echo '</table>';



































                
        

        ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        </div>

        
    
</body>
</html>