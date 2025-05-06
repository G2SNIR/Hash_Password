<?php
/************************************************************************************************
 *                              SCRIPT PHP de hashage de mot de passe                           *
 *      Ce script :                                                                             *
 *          1 : se connecte à la base de données                                                *
 *          2 : lit le pseudo et le mot de passe non hashé de la table utilisateur              *
 *          3 : parcourt tous les enregistrements trouvé                                        *
 *          4 : hashe les mots de passe                                                         *
 *          5 : enregistre le pseudo et le mot de passe hashé dans la table utilisateur_hash    *
 *                                                                                              *
 *          VOTRE MISSION : compléter les zone de commentaire contenant A COMPLETER             *
 *              et vérifier progressivement le bon fonctionnement du script                     *
************************************************************************************************/

/***** 1 : CONNEXION A LA BASE DE DONNEES *****/
// Paramètres de connexion à la base de données :
$dbname = "";               // A COMPLETER
$dbhost="localhost";
$dbport=3306;
$dbuser="";                 // A COMPLETER
$dbpasswd="";               // A COMPLETER

try {
    // Connexion à la base de données avec les paramètres précédents
    $pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
} catch (PDOException $e) {
    echo "BAD : Connexion à la base de données impossible.\n";
    die();
}

echo "GOOD : Connexion à la base de données réussie.\n";

/***** 2 : LECTURE DES DONNEES DE LA TABLE utilisateur *****/
// Requete permettant de récupérer toutes les données de la table utilisateur : A MODIFIER
$requete = "";
// Préparation de la requete
$requete_preparee = $pdo->prepare($requete);
// Exécution de la requete préparée
$requete_preparee->execute();
// Récupération des résultats dans un tableau $resultat
$resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);

/***** 3 : ON PARCOURT TOUS LES ENREGISTREMENTS TROUVES *****/
// La boucle for commence à 0 jusqu'au dernier enregistrement  par pas de 1
for($i=/* A COMPLETER : valeur de départ */ ; $i<count(/* A COMPLETER : le tableau de résultat */) ; /* A COMPLETER : incrémentation de $i de 1 */)
{ 
    // Affichage des éléments se trouvant dans le tableau $resultat
    echo "id_utilisateur : " . $resultat[$i]["id_utilisateur"] . "\n";
    echo "pseudo : " . $resultat[$i]["pseudo"] . "\n";
    echo "mdp : " . $resultat[$i]["mdp"] . "\n\n";

    // HASHAGE DU MOT DE PASSE AVEC LA FONCTION password_hash
    $mdp_hash = /* A COMPLETER : Le nom de la fonction de hashage */($resultat[$i]["mdp"], PASSWORD_DEFAULT);

    echo "mdp hash : " . /* A COMPLETER : le mot de passe hashé */ . "\n\n";

    // La requete SQL permettant d'insérer dans la table utilisateur_hash le pseudo et le mot de passe hashé
    $requete_hash = "INSERT INTO utilisateur_hash (pseudo, mdp_hash) VALUES (?,?)";
    $requete_hash_preparee = $pdo->prepare($requete_hash);
    $requete_hash_preparee->bindParam(1,/* A COMPLETER : le pseudo de l'utilisateur */);
    $requete_hash_preparee->bindParam(2, /* A COMPLETER : le mot de passe hashé */);
    $requete_hash_preparee->execute();

}


?>
