-- Création de la Base de Données
CREATE DATABASE IF NOT EXISTS password_hash;

-- Création de l utilisateur et attribution des droits
CREATE USER IF NOT EXISTS 'hasher'@'%' IDENTIFIED BY 'hasher';
GRANT ALL PRIVILEGES ON password_hash.* TO 'hasher'@'%'; 

USE password_hash;

-- On supprime toutes les tables si elles existent
DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS utilisateur_hash;


-- Création de la table utilisateur
CREATE TABLE IF NOT EXISTS utilisateur (
    id_utilisateur INT NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(50),
    mdp VARCHAR(50),
    PRIMARY KEY(id_utilisateur)
);

-- Remplissage de la table utilisateur avec quelques valeurs
INSERT INTO utilisateur(pseudo, mdp) VALUES ('jean','jean1'),('emilie','emilie1'),('john','TousLesMatinsJeMangeDesKeloggs@6h30');

-- Création de la table utilisateur_hash : A FAIRE
