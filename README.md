# Symfony-TP-Article
## Guide d'Installation et de Configuration de l'Application Symfony

Pour mettre en place ton application Symfony correctement, suis attentivement ces étapes :

### Étape 1 : Mettre à jour les dépendances PHP avec Composer

```bash
composer update
```

### Étape 2 : Installer les dépendances JavaScript avec npm
```bash
npm install
```

### Étape 3 : Lancer le suivi des modifications des fichiers JavaScript et CSS
```bash
npm run watch
```
### Étape 4 : Créer la base de données via Doctrine
```bash
php bin/console doctrine:database:create
```

### Étape 5 : Générer une migration pour les changements de schéma
```bash
php bin/console make:migration
```

### Étape 6 : Exécuter la migration pour appliquer les changements à la base de données
```bash
php bin/console doctrine:migration:migrate
```

### Étape 7 : Ajouter manuellement des articles dans la table 'article' via phpMyAdmin
#### Après avoir configuré la base de données, ouvrez phpMyAdmin et insérez manuellement des données dans la table 'article'.

