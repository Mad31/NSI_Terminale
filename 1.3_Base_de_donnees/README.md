# NSI_Terminale
## Activité 1.3 Base de données.

Ces fichiers sont utilisés dans le cadre de la séquence "Bases de données"

## 1. Prérequis
### 1.1 Espaces personnels 
Cette activité utilise les espaces personnels d'un serveur Apache, si ce n'est pas déja fait il faut activer ces espaces personnels. Sur Debian :
```bash
a2enmod userdir 
systemctl restart apache2
```
### 1.2 Autoriser php pour les espaces personnels.
Pour cela dans le fichier `/etc/apache2/mods-enabled/php5.conf ` , il faut commenter les lignes :

```
<IfModule mod_userdir.c> 
  <Directory /home/*/public_html> 
    php_admin_value engine Off 
   </Directory> 
 </IfModule>
 ```



