<?php
// Connexion  à la base de données
$db="sql_injection";
$dbhost="localhost";
$dbport=3306;
$dbuser="hacker_sql_injection";
$dbpasswd="hacker";

try {
    $pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
} catch (PDOException $e) {
    echo "BAD : Connexion à la base de données impossible.\n";
    die();
}

echo "GOOD : Connexion à la base de données réussie.\n";


// Lecture de la table 
$requete = "SELECT * FROM utilisateur";
$requete_preparee = $pdo->prepare($requete);
$requete_preparee->execute();
$resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
// On fait une boucle qui parcourt tous les utilisateurs
for($i=0 ; $i<count($resultat) ; $i++)
{ 
    echo "id_utilisateur : " . $resultat[$i]["id_utilisateur"] . "\n";
    echo "pseudo : " . $resultat[$i]["pseudo"] . "\n";
    echo "mdp : " . $resultat[$i]["mdp"] . "\n\n";

    $mdp_hash = password_hash($resultat[$i]["mdp"], PASSWORD_DEFAULT);

    echo "mdp hash : " . $mdp_hash . "\n\n";

    $requete_hash = "INSERT INTO utilisateur_hash (pseudo, mdp_hash) VALUES (?,?)";
    $requete_hash_preparee = $pdo->prepare($requete_hash);
    $requete_hash_preparee->bindParam(1,$resultat[$i]["pseudo"]);
    $requete_hash_preparee->bindParam(2,$mdp_hash);
    $requete_hash_preparee->execute();

}


?>