# Ouvrez Notepad ou votre éditeur et créez ce fichier :
FROM php:8.2-fpm

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Définir le répertoire de travail
WORKDIR /var/www/html

# Exposer le port 9000 pour PHP-FPM
EXPOSE 9000

# Commande par défaut