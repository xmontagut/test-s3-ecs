# test-s3-ecs
Test accès bucket S3 de Dell ECS avec le SDK Amazon pour PHP

## Description
Le code teste si on peut lister les buckets une fois connecté.

## Pré-requis
Disposer de PHP en mode CLI avec module XML (Curl optionnel).

Sous famille Debian / Ubuntu :
```bash
sudo apt install php-cli php-xml php-curl
```

## Procédure de test

### Accès au bucket
Vous devez définir deux variables d'environnement pour l'accès au bucket :
```
export AWS_ACCESS_KEY_ID=xxxx
export AWS_SECRET_ACCESS_KEY=xxx
```

L'URL de l'endpoint doit être passé via l'argument `-e`

### Utilisation SDK version 3.33 : OK

```bash
php composer.phar  remove aws/aws-sdk-php
php composer.phar  require aws/aws-sdk-php=3.33

php list_buckets.php -e https://....
```

### Utilisation dernière version du SDK : NOK

```bash
php composer.phar  remove aws/aws-sdk-php
php composer.phar  require aws/aws-sdk-php

php list_buckets.php -e https://....
```
