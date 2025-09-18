📖 Kabook - projet personnel de fin de formation

Kabook est une application web développée avec Laravel et MySQL qui a pour objectif de faciliter la mise en relation entre les professionnels du secteur animalier et les particuliers à la recherche de services adaptés pour leurs animaux.

✨ Fonctionnalités principales

👤 Inscription et authentification sécurisée (utilisateurs, professionnels et administrateurs).

🐾 Création et gestion de profil professionnel (informations de contact, métiers, animaux pris en charge, déplacements à domicile, tarifs, expériences, etc.).

🔍 Barre de recherche avancée pour trouver un professionnel par :

catégorie de métier,

catégorie d’animaux,

département.

✅ Validation des profils par un administrateur.

📋 Gestion des rôles utilisateurs : utilisateur, professionnel, administrateur.

📱 Interface responsive (ordinateur, tablette, mobile).

🛠️ Technologies utilisées

- Back-end : Laravel (PHP, MVC)

- Base de données : MySQL (modélisation MCD / MLD / dictionnaire de données)

- Front-end : Blade, CSS, JavaScript (interactivité, formulaires dynamiques)

🎯 Objectif du projet

Kabook est un MVP (Minimum Viable Product) développé dans le cadre d’un projet de fin de formation en développement web. Il permet de mettre en pratique l’ensemble des compétences acquises : conception, modélisation de données, développement full-stack, gestion de projet agile et prise en compte de l’accessibilité numérique.

Outils : Trello (gestion de projet agile), Figma (maquettage UI/UX), GitHub (versionning).

🚀 Installation du projet en local

Cloner le dépôt :

git clone https://github.com/ton-utilisateur/kabook.git
cd kabook


Installer les dépendances PHP :

composer install


Installer les dépendances front-end :

npm install && npm run dev


Configurer l’environnement :

Copier le fichier .env.example en .env

Configurer la base de données MySQL

Générer la clé de l’application :

php artisan key:generate


Lancer les migrations :

php artisan migrate


Démarrer le serveur local :

php artisan serve


Le projet sera accessible sur http://localhost:8000
