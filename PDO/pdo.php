<?php


// echo '<pre>'; print_r(get_declared_classes()); echo '</pre>';

echo '<h1>Connexion à une BDD</h1>';

$host = 'mysql:host=localhost;dbname=entreprise'; // le serveur (localhost) et le nom de la BDD (entreprise)
$login = 'root'; // le login de connexion à Mysql
$password = '';  // le mdp de connexion à Mysql (sur xampp et wamp, pas de mdp, sur mamp "root")
$options = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

// PDO:ATTR_ERRMODE => PDO::ERRMODE_WARNING : gestion des erreurs en mode warning (sinon les erreurs sont cachées)
// PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' : gestion de l'utf-8 pour forcer sur la BDD en cas de souci d'encodage des caractères

// PDO : PHP Data Object

// création de l'objet :
$pdo = new PDO($host, $login, $password, $options);

// pour voir si l'objet est crée (vide car aucune propriété dans pdo)
var_dump($pdo);

// pour voir les méthodes de notre objet
echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';

echo '<h2>Query : pour une requête de type action (INSERT / UPDATE / DELETE)</h2>';

// la methode query() permet de déclencher une recherche dans la BDD

// INSERT :
// $resultat = $pdo->query("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Julien', 'Lebron', 'm', 'Web', CURDATE(), 4500)");

// UPDATE :
// $resultat = $pdo->query("UPDATE employes SET salaire = 5000 WHERE id_employes = 991");
// $resultat = $pdo->query("UPDATE employes SET salaire = (salaire+200) WHERE service='secretariat'");

// DELETE : 
// $resultat = $pdo->query("DELETE FROM employes WHERE id_employes = 998");
// $resultat = $pdo->query("DELETE FROM employes WHERE id_employes IN(992,993)");
// $resultat = $pdo->query("DELETE FROM employes WHERE service='Web' AND id_employes != 991");


// pour connaître le nombre de ligne impactées : rowCount()
// echo 'Nombre de ligne impactées par la dernière requête : ' . $resultat->rowCount() . '<br>';

echo '<h2>Query : pour une requete de type question (SELECT) pour une seule ligne de résultat</h2>';


$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes = 655");
print_r($resultat);
echo '<br>';

echo 'Nombre de ligne impactées par la dernière requête : ' . $resultat->rowCount() . '<br>';

// En l'état, la réponse de la base de données ($resultat) est inexploitable en l'état
// Pour rendre les données exploitable par PHP, il faut transformer la ligne obtenues avec la méthode fetch()
// Une ligne traitées avec un fetch ne pourra pas être traitée plus d'une fois

// FETCH_ASSOC pour obtenir la ligne sql sous forme de tableau array associatif (associatif : on associe le nom des colonnes comme étant les indices du tableau array).

// $donnees = $resultat->fetch(PDO::FETCH_ASSOC); // on traite la ligne avec un fetch en mode FETCH_ASSOC

// FETCH_NUM pour obtenir la ligne sql sous forme de tableau array avec des indices numériques
// $donnees = $resultat->fetch(PDO::FETCH_NUM);

// FETCH_BOTH (cas par défaut si non précisé) pour obtenir un mélange de FETCH_ASSOC et FETCH_NUM
// $donnees = $resultat->fetch();

// FETCH_OBJ pour obtenir un nouvel objet avec les colonnes comme propriétés publique 
$donnees = $resultat->fetch(PDO::FETCH_OBJ);


echo '<pre>'; print_r($donnees); echo '</pre>';

// echo $donnees['prenom'] . '<br>'; // Avec FETCH_ASSOC
// echo $donnees[1] . '<br>'; // Avec FETCH_NUM
echo $donnees->prenom . '<br>';

echo '<h2>Query : pour une requete de type question (SELECT) pour plusieurs lignes de résultat</h2>';

$resultat = $pdo->query("SELECT * FROM employes");

echo 'Nombre d\'employes dans l\'entreprise : ' . $resultat->rowCount() . '<br>';

// votre requete vous renvoie une seule ligne de résultat : un fetch
// votre requete vous renvoi plusieurs lignes de résultat : une boucle pour appliquer un fetch à chaque tour de boucle

// pour faire une boucle sur un jeu de résultat : while()
// while() va tourner tant qu'il y a une ligne que l'on traite avec un fetch, puis s'arrêtera naturellement lorsque toutes les lignes sont traitées.

while($ligne_en_cours = $resultat->fetch(PDO::FETCH_ASSOC))
{
    echo '<pre>'; print_r($ligne_en_cours); echo '</pre>';
}

echo 'Pour un affichage propre : <hr>';
echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-between">';

$resultat = $pdo->query("SELECT * FROM employes");

    while($ligne_en_cours = $resultat->fetch(PDO::FETCH_ASSOC))
    {
        echo '<div style="background-color: #0EAAE5; color: white; padding: 10px; box-sizing: border-box; width: 19%; margin-top: 20px;">';

        // echo 'ID_employes : ' . $ligne_en_cours['id_employes'] . '<br>';
        // echo 'Prénom : ' . $ligne_en_cours['prenom'] . '<br>';
        // echo 'Nom : ' . $ligne_en_cours['nom'] . '<br>';
        // echo 'Service : ' . $ligne_en_cours['service'] . '<br>';
        // echo 'Sexe : ' . $ligne_en_cours['sexe'] . '<br>';
        // echo 'Date embauche : ' . $ligne_en_cours['date_embauche'] . '<br>';
        // echo 'Salaire : ' . $ligne_en_cours['salaire'] . '<br>';

        foreach($ligne_en_cours AS $indice => $valeur)
        {
            echo ucfirst($indice) . ' : ' . $valeur . '<br>';
        }

        echo '</div>';
    }

echo '</div>';

echo '<h2>Query : pour plusieurs de résultat avec fetchAll()</h2>';

$resultat = $pdo->query("SELECT * FROM employes");

$tab_multi = $resultat->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($tab_multi); echo '</pre>';

// dans un array multidimensionnel, on met une succession de crochet [] pour chaque niveau
// exemple : 
echo $tab_multi[14]['prenom'] . '<br>';

// fetchAll() permet de traiter toutes les lignes d'un coup et nous renvoi un array multidimensionnel contenant toutes les lignes de la réponse de la BDD à des indices différents

echo '<ul>';

foreach($tab_multi AS $sous_tableau)
{
    echo '<pre>'; print_r($sous_tableau); echo '</pre>';
    echo '<li>' . $sous_tableau['prenom'] . ' ' . $sous_tableau['nom'] .  '</li>';
}

echo '</ul>';


echo '<h2>Affichage de n\'importe quelle reqête sous forme de tableau html</h2>';

$resultat = $pdo->query("SELECT * FROM employes");

echo '<table border="1" style="width: 100%; border-collapse: collapse;">';
// gestion des colonnes du tableau
echo '<tr>';

for($i = 0; $i < $resultat->columnCount(); $i++)
{
    // getColumnMeta() nous renvoi un tableau array avec les informations d'une colonne de la réponse sql
    // on peut appeler le ['name'] pour l'afficher dans le tableau
    $infos_colonne = $resultat->getColumnMeta($i);
    echo '<th style="padding: 5px 10px;">' . $infos_colonne['name'] . '</th>';
}
echo '</tr>';

// gestion des données du tableau :
while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
{
    echo '<tr>';
    foreach($ligne AS $val)
    {
        echo '<td style="padding: 5px 10px;">' . $val . '</td>';
    }
    echo '</tr>';
}

echo '</table>';


echo '<h2>Requete préparée avec prepare() bindParam() et execute() à privilégier pour la sécurité</h2>';

// avec prepare()
// on prepare la requête et on représente l'information attendue par un marqueur nominatif
// prepare va nous protéger contre les attaques SQL

$service = 'informatique';

$resultat = $pdo->prepare('SELECT * FROM employes WHERE service = :marqueur'); // :marqueur est un marqueur nominatif
// on rattache la valeur correspondante ou marqueur nominatif

// bindParam(le_marqueur, sa_valeur, son_type)
$resultat->bindParam(':marqueur', $service, PDO::PARAM_STR); // PDO::PARAM_STR explique que la valeur doit être traitée comme une chaine de caractère

// on execute
$resultat->execute();

$infos = $resultat->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($infos); echo '</pre>';

// plusieurs marqueur nominatifs : plusieurs bindParam (1 bindParam par marqueur nominatif)
$service = '#';
$salaire = 2400;

$resultat2 = $pdo->prepare('SELECT * FROM employes WHERE service = :marqueur AND salaire > :marqueur2');
$resultat2->bindParam(':marqueur', $service, PDO::PARAM_STR);
$resultat2->bindParam(':marqueur2', $salaire, PDO::PARAM_STR);
$resultat2->execute();
echo '<hr>Requête préparée 2 : ' . $resultat2->rowCount() . '<hr>';


