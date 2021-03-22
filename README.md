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


# Controller
### Qu'est-ce que le ParamConverter ? À quoi sert le Doctrine Param Converter ?
ParamConverter permet de transformer automatiquement un paramètre de route, comme {id} dans notre exemple, en une entité (Post, Comment).

# Formulaire
### Qu'est-ce qu'un formulaire Symfony ?
Un formulaire Symfony est un composant. Il est généré de la même manière qu'une entitée. Le formulaire est souvent rattaché à une entité existante, ce qui facilite les traitements qui suivent la création du form.

### Quels avantages offrent l'usage d'un formulaire ?
Les formulaires Symfony permettent une manipulation et un traitement des entités plus facile qu'un formulaire traditionel. 

### Quelles sont les différentes personalisations de formulaire qui peuvent être faites dans Symfony ?
On peut utiliser des thèmes. On peut également créer des templated sois-même.

# Security
### Définir les termes suivants : Encoder, Provider, Firewall, Access Control, Role, Voter
* **Encoder** : S'occupe d'encoder les mots de passe si ceux-ci sont nécessaires. C'est un traitement qui est fait avant la sauvegarde en BDD. 
* **Provider** : Le user provider s'occupe de principalement 2 choses : Recharger l'utilisateur au sein d'une session, ou charger un utilisateur pour lui donner accès à des fonctionnalités. En gros, se sont des services qui permettent de manipuler et utiliser les users au sein de l'application.
Par exemple, il existe un provider nommé "entity" qui permet simplement de récupérer des user en base. Il en existe beaucoup d'autre, et il est également possible d'en faire des custom.
* **Firewall** : Permet de définir la manière par laquelle le user se connecte à l'application. 
* **Access Control** : Fonctions qui permettent de vérifier les différents états d'un utilisateur (savoir s'il a accès à certaines choses avec is_granted, savoir s'il est bien connecté, ...)
* **Role** : Les rôles sont utilisés principalement pour établir une hierarchie de privilèges au sein d'un site. Cela permet de bloquer de grant des accès à certaines fonctionnalités en fonction des rôles de la personne connectée.
* **Voter** : Les voters sont le moyen le plus puissant de Symfony pour gérer les permissions. Ils permettent de centraliser toute la logique des permissions, puis de les réutiliser à de nombreux endroits.

### Qu'est-ce que FOSUserBundle ? Pourquoi ne pas l'utiliser ?
Le FOSUserBundle offre une couche supplémentaire au security component de symfony qui rend apparement la gestion des utilisateur au sein d'une app symfony plus simple et plus rapide. 
Nous ne l'utiliserons pas car, dans notre cas, c'est une solution trop poussée et trop complexe à mettre en oeuvre. De plus, la solution est deprecated et non compatible avec Symfony 5.

### Définir les termes suivants : Argon2i, Bcrypt, Plaintext, BasicHTTP
* **Argon2i** : Hasher de mot de passe. Apparement plus poussé et plus configurable
* **Bcrypt** : Autre algorythme de hash.
* **Plaintext** : Encodeur de base d'un mot de passe utilisateur. On recommande le switch sur un hasher de type bcrypt par exemple.
* **BasicHTTP** : Méthode basique d'envoie des données utilisateur au sein d'un firewall

### Expliquer le principe de hachage.
![](https://i.imgur.com/DxkuGA5.png)
Le hashing permet, à partir d'une chaine de caractère et d'un algorythme spécifique, créer une nouvelle chaine de caractères complexe générée par plusieurs procédés. Ceux-ci dépendent du hasher utilisé. 
