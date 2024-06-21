# **Démarrage du Projet**

Pour lancer et exécuter le projet, suivez ces étapes détaillées.

## Installation de Composer et des Dépendances PHP

Composer est un outil essentiel pour la gestion des dépendances PHP dans notre projet. Assurez-vous d'avoir Composer et les extensions PHP nécessaires installés sur votre système. Voici les commandes à exécuter sur un système basé sur Ubuntu :

1. Mettre à jour les paquets du système :

   ```bash
   sudo apt-get update
   ```

2. Mettre à niveau les paquets du système :

   ```bash
   sudo apt-get upgrade
   ```

3. Installer Composer :

   ```bash
   sudo apt-get install composer
   ```

4. Installer l'extension PHP `mbstring` :

   ```bash
   sudo apt-get install php-mbstring
   ```

5. Installer l'extension PHP `xml` :

   ```bash
   sudo apt-get install php-xml
   ```

## Lancement du Projet

Une fois Composer et les dépendances PHP installés, procédez comme suit pour démarrer l'application :

1. Installer les dépendances du projet avec Composer :

   ```bash
   composer install
   ```

2. Générer le classmap autoloader avec Composer :

   ```bash
   composer dump-autoload
   ```

3. Démarrer le service MariaDB :

   ```bash
   sudo service mariadb start
   ```

4. Lancer le serveur de développement PHP avec Artisan :

   ```bash
   php artisan serve
   ```

Après ces étapes, votre projet devrait être opérationnel sur le serveur de développement local.

## **Test**

Pour exécuter les tests, accédez au répertoire racine du projet et utilisez la commande suivante :

```bash
php artisan test --filter Feature
```

# Présentation du site de vente en ligne de COSMIC

## Accueil

En arrivant sur le site, la page d’accueil vous est présentée, vous avez alors le choix d’explorer les différents liens de la barre de Navigation ou de scroll dans la page pour en découvrir une partie.

## Liens de la barre de Navigation

Accueil redirige à la page d’accueil, Nos Produits à une page avec tous les articles, Nouveautés à la page présentant les 4 derniers articles. A propos conduira à une page expliquant les objectifs de l’entreprise et Nous contacter à un formulaire pour contacter notre équipe. L'icône loupe vous permet d’effectuer une recherche pour trouver votre article. L'icône panier redirige vers le panier de l’utilisateur connecté ou à la page de connexion, et l'icône utilisateur vous permet de vous connecter, vous déconnecter et gérer votre compte.

## Connexion

Pour vous connecter, il suffit de cliquer sur l'icône user. Un compte admin est à votre disposition avec l’adresse mail admin@admin.com et le mot de passe admin, un compte client existe aussi déjà, a@a.com, password. Vous pouvez aussi créer un compte puis vous connecter.

Une fois connecté en tant que client, vous pouvez accéder à votre panier, y ajouter des articles, passer une commande et modifier votre compte.

En tant qu’admin vous aurez accès à une nouvelle icône permettant de gérer les articles, mais vous ne pourrez ni modifier le compte, ni accéder à un panier et donc commander.

## Articles et pages Produits

Une fois sur une page présentant plusieurs articles, vous pouvez cliquer sur la petite icône bleue, pour filtrer les articles présentés. Vous pouvez cliquer sur un article pour accéder à sa page de présentation.

Sur chaque page article, l’article est présenté et vous pouvez ajouter une quantité d’exemplaires de cet article à votre panier.
