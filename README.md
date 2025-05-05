# Installation

Prérequis : vous devez disposez d'un serveur Apache 2, d'une base de données MariaDB ou MySQL et d'interpréteur PHP. Les étapes d'installations suivantes sont disponibles pour :
1. XAMPP installé sur Windows
2. Une solution LAMP installée sur une machine Linux.



## Etape 1 : Déploiement de la BDD

Ce site web utilise une base de données sql_injection et un utilisateur hacker_sql_injection. Toutes les informations concernant la structure de cette base de données et de l'utilisateur associé se trouve dans le fichier BDD/BDD.sql.

Il est nécessaire d'exécuter ce script pour mettre en place la base de données du site web.

### Installation de la BDD sur Linux :

Rester dans le répertoire /var/www/html et taper la commande :

    sudo mysql < SQL_Injection/BDD/BDD.sql

### Avec XAMPP sur Windows :

Déplacer vous dans le répertoire d'installation de mysql dans XAMPP, puis tapez les commandes suivantes

    mysql -u root
    mysql> source ../../SQL_Injection/BDD/BDD.sql

## ETAPE 2 : 