<?php


// session_start() permet de créer un fichier de session dans le serveur au niveau du dossier tmp/
// xamp/tmp
// mamp/tmp/php
// et aussi un cookie sur le navigateur de l'utilisateur lié la session

// Outil majeur PHP nous permettant de stocker des informations avant l'enregistrement en bdd ou autre.
// exemple conservation d'un panier avant la validation de la commande qui nous permettra d'enregistrer en BDD

// $_SESSION est une superglobale (tableau array)
// $_SESSION n'existe pas tant que l'on ne la crée pas avec un session_start()

session_start();

$_SESSION['pseudo'] = 'Admin';
$_SESSION['mdp'] = 'Soleil';
$_SESSION['email'] = 'admin@gmail.com';
$_SESSION['adresse'] = '43 rue du test';
$_SESSION['ville'] = 'Paris';
$_SESSION['cp'] = '75010';

echo 'Premier affichage de la session : <hr>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

echo 'Votre pseudo est : ' . $_SESSION['pseudo'] . '<br><br>';

// Pour supprimer un élément du tableau :
unset($_SESSION['mdp']);

echo 'Deuxième affichage de la session : <hr>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// Pour supprimer une session : 
// session_destroy(); Cette fonction est bien reconnue par le langage mais ne sera pas exécutée immédiatement. Le langage va d'abord exécuter toutes les lignes de code de cette page et ensuite la fonction session_destroy() pour supprimer la session.
// L'affichage suivant peut donc afficher la session car elle ne sera supprimée qu'après ces dernières lignes.

session_destroy();

echo 'Troisème affichage de la session : <hr>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
