Arcadia Zoo - Application Web
Présentation
Le zoo Arcadia, situé près de la forêt de Brocéliande en Bretagne depuis 1960, est engagé dans une démarche écologique et autosuffisante en énergie. Cette application web vise à améliorer la visibilité du zoo en permettant :

La consultation des habitats, animaux, et services (visiteurs).
La gestion des avis, des rapports vétérinaires, et des consommations alimentaires (administrateurs, employés, vétérinaires).
Le suivi statistique des consultations d’animaux.
Une interface respectant les normes RGPD, RGAA, et CNIL avec un thème écologique (palette verte).

Fonctionnalités

Visiteurs : Consultation de la page d'accueil, des habitats, des services, et des détails des animaux. Soumission d’avis et formulaires de contact.
Administrateurs : Gestion des comptes, services, habitats, animaux, consultation des rapports vétérinaires et statistiques.
Employés : Validation/suppression des avis, ajout de la consommation alimentaire des animaux.
Vétérinaires : Ajout de comptes rendus de santé, commentaires sur les habitats, consultation de l’historique alimentaire.
Connexion sécurisée : Authentification pour administrateurs, employés, et vétérinaires.
Statistiques : Suivi des consultations d’animaux via Firestore.

Prérequis

PHP : 8.4.6
Composer : 2.x
Symfony : 5.11.0
Node.js : 16.x ou supérieur (avec npm)
PostgreSQL : 13.x ou supérieur (avec pgAdmin recommandé)
Firebase : Compte Google Cloud avec Firestore configuré
Docker : Docker Desktop pour le déploiement
Git : Pour cloner le dépôt
Postman : Pour tester les API
PHPUnit : Pour les tests unitaires

Installation

Cloner le dépôt GitHub :
git clone https://github.com/votre-utilisateur/arcadia-zoo.git
cd arcadia-zoo


Installer les dépendances PHP avec Composer :
composer install


Installer les dépendances front-end avec npm :
npm install
npm run build


Configurer l’environnement :

Copiez le fichier .env.example en .env :cp .env.example .env


Modifiez les variables d’environnement dans .env pour PostgreSQL et Firebase :DATABASE_URL="postgresql://user:password@127.0.0.1:5432/arcadia_db?serverVersion=13&charset=utf8"
FIREBASE_CREDENTIALS=/path/to/firebase-service-account.json




Créer la base de données PostgreSQL :
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate


Configurer Firebase :

Téléchargez les identifiants JSON de votre projet Firebase depuis Google Cloud Console.
Placez le fichier JSON dans un dossier sécurisé et mettez à jour le chemin dans .env.


Lancer le serveur de développement Symfony :
symfony server:start

Accédez à l’application via http://localhost:8000.


Structure du projet
arcadia-zoo/
├── config/                    # Configuration Symfony (routes, services, etc.)
├── public/                    # Fichiers publics (CSS, JS, images)
├── src/
│   ├── Controller/            # Contrôleurs Symfony
│   ├── Entity/               # Entités Doctrine (Habitat, Animal, etc.)
│   ├── Repository/           # Repositories pour accès aux données
│   ├── Security/             # Gestion de l’authentification
│   ├── Service/              # Services pour Firebase et autres logiques
│   └── Templates/            # Templates Twig
├── migrations/                # Migrations Doctrine
├── tests/                     # Tests PHPUnit
├── assets/                    # Fichiers front-end (JS, CSS)
├── docker/                    # Configuration Docker
├── .env                       # Variables d’environnement
├── composer.json              # Dépendances PHP
├── package.json               # Dépendances Node.js
└── README.md                  # Ce fichier

Déploiement
Avec Docker

Assurez-vous que Docker et Docker Compose sont installés.
Construisez et lancez les conteneurs :docker-compose up -d --build


Accédez à l’application via l’URL fournie (généralement http://localhost).

Avec GitHub Actions et Netlify

GitHub Actions : Le workflow CI/CD est configuré dans .github/workflows/ci-cd.yml pour tester et déployer automatiquement.
Netlify : Configurez Netlify pour déployer les fichiers statiques générés (public/build/) après exécution de npm run build.

Tests

Tests unitaires (PHPUnit) :php bin/phpunit


Tests API (Postman) :
Importez la collection Postman fournie dans docs/postman_collection.json.
Testez les endpoints comme /api/habitats ou /api/animals.



Charte graphique

Palette : Vert foncé (#2E4D36), vert clair (#A5D6A7), jaune doré (#FBC02D), marron (#6D4C41), blanc cassé (#F5F5F5).
Polices : Sobres et modernes (à définir, ex. : Roboto, Open Sans).
Thème : Écologique, optimisé pour l’accessibilité (RGAA).

Gestion de projet

Outil : Trello (ou Notion) pour le suivi des tâches (Kanban, méthode agile).
Git :
Branche main : Version stable.
Branche develop : Intégration des fonctionnalités.
Branches feature/* : Pour chaque nouvelle fonctionnalité.



Livrables

Code source : GitHub
Application en ligne : Netlify
Documentation : Cahier des charges, diagrammes (MCD, cas d’utilisation, séquence), charte graphique (PDF).
Maquettes : Zoning, wireframes, mockups (3 desktop, 3 mobile).
Fichier SQL : Base PostgreSQL et structure Firestore.
Manuel utilisateur : PDF expliquant l’utilisation.

Contributeurs

Gurpreet : Auteur du cahier des charges, développeur principal.
José : Directeur du zoo Arcadia, initiateur du projet.
Josette : Assistante du directeur.

Licence
Ce projet est sous licence MIT. Voir le fichier LICENSE pour plus de détails.
