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
    <h1>Exercice GET Page 1</h1>
    <ul>
        <li><a href="page2.php?categorie=Pantalon&couleur=Rouge&taille=M&prix=90">Pantalon</a></li>
        <li><a href="page2.php?categorie=Chemise">Chemise</a></li>
        <li><a href="page2.php?categorie=Tshirt">Tshirt</a></li>
        <li><a href="page2.php?categorie=Polo">Polo</a></li>
        <li><a href="page2.php?categorie=Veste">Veste</a></li>
    </ul>
</div>

    <!-- Dans une url, il est possible de rajouter des informations ne concernant pas l'adresse de la page.
    S'il y a un ? dans l'url, l'adresse est avant le ?, ensuite on trouve des informations sous la forme :
        ?indice1=valeur1&indice2=valeur2&indice3=valeur3&...
     -->

</body>
</html>




<!-- 
https://
www.leboncoin.fr/
recherche
?
category=2
&
text=Renault%20Modus
&
locations=r_12
&
brand=Renault
&
model=Modus
&
price=1000-5000 -->