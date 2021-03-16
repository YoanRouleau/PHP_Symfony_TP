# PHP Symfony - TP3
# Getting started
### A quoi sert le Symfony CLI ?
Il permet notamment d'initialiser, reprendre ou gérer des projet symfony en ligne de commande. Il permet également de faire des check (sécurité, éléments requis, ...).

# Doctrine
### Quelles relations existent entre les entités (Many To One/Many To Many/...) ? Faire un schéma de la base de données.
- Many to Many
- One to Many
- One to One
- Many to One

![](https://i.imgur.com/qvwwJjF.png)

### Expliquer ce qu'est le fichier .env
Le fichier .env est conçu pour recevoir les variables d'environnement, les données de connexion à la BDD ou aux API, ou toute données qui doivent être rendu secrètes.

### Expliquer pourquoi il faut changer le connecteur à la base de données
Il nous faut choisir le connecteur adéquat à la solution déployée. Symfony semble proposer, de base, plusieurs connecteurs. Inutile d'en avoir 3 si on en utilise qu'un seul.

### Expliquer l'intérêt des migrations d'une base de données
L'intérêt est de pouvoir générer une base de données (SQLite pour notre cas) en ligne de commande : ça rend la tâche plus clair et plus facile.
Migrate permet de convertir les models créés avec Doctrine en fichier SQL. Cela permet également de pouvoir versionner sa base de donnée, mais aussi pouvoir faire des transformations de données.  


# Administration
### Faire une recherche sur les différentes solutions disponibles pour l'administration dans Symfony
En ce qui concerne les solutions d'administration de Symfony, sur sa documentation, je n'ai pu trouver que Sonata et Easyadmin. 

### Travail préparatoire : Qu'est-ce que EasyAdmin ?
EasyAdmin est un bundle permettant de créer rapidement et proprement un backoffice/panel administrateur pour la gestion d'un projet Symfony.
Easyadmin semble être la solution la plus conseillée lorsque l'on regarde à droite à gauche sur le net.

### Pourquoi doit-on implémenter les méthodes ToString dans nos entités ?
__ToString nous permet d'afficher une entitée, sans provoquer d'erreur ou d'affichage chelou. Dans le cas d'une Publication (sur notre TP), on utilise ToString pour afficher le titre de la publi dans EasyAdmin, ou autre.


## Controller
### Qu'est-ce que le ParamConverter ? À quoi sert le Doctrine Param Converter ?
ParamConverter permet de transformer automatiquement un paramètre de route, comme {id} dans notre exemple, en une entité (Post, Comment).

