# Web menu

Cette application web est créée sous PHP 8 accompagné du framework CakePhP 4.x.

## Dépendances

-   PHP 8 avec CakePHP 4.6
    
-   Bootstrap 4.6
    
-   MySQL/MariaDB
    
-   Serveur Web Apache ou Nginx (Ce dernier n'est pas présenté dans cette documentation)
    

## Installation

1.  Décompressez le contenu de l'archive dans le dossier des sites web d'Apache (très souvent un dossier `www`, consulter la documentation du système d'exploitation où vous hébergez Apache).
2. Dans le dossier des sites valides de Apache (`/etc/apache2/sites-available` sur Ubuntu par exemple), créer un nouveau fichier `domaine.extension.conf`.
3. Dans ce fichier, collez et adaptez le code suivant :
```apache
<VirtualHost *:80>
    ServerName domaine.extension
    DocumentRoot <chemin_vers_www>/www/<dossier_du_site>/webroot

    <Directory <chemin_vers_www>/www/<dossier_du_site>/webroot>
        Options -Indexes +FollowSymLinks
        AllowOverride All
    </Directory>
</VirtualHost>
```
4.	Dans une invite de commande lancer ces deux lignes de commande (Linux seulement):
```bash
sudo a2ensite domaine.extension
# OU
sudo ln -s /etc/apache2/sites-available/domaine.extension.conf /etc/apache2/sites-enabled/
# Puis
sudo systemctl restart apache2
```
5. Vous pouvez accéder au site (`http://domaine.extension`)

## Première installation
L'initialisation du système est à l'adresse `http://domaine.extension/init/`.

Note : Si les accès de la base de données ne permettent pas au système de créer la base de données, vous pouvez la créer avant l'initialisation avec le nom `webmenu_<nom_de_la_ville>` (le login admin est <nom_de_la_ville>@webmenu.com).

