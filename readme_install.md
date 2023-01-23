------------------------------------------------------------------------------------------------------------------------
INSTALL:
------------------------------------------------------------------------------------------------------------------------

composer:

    "require": {
        "php": "^8.0.2",

    OU

    "require": {
        "php": "^7.3|^8.0",


    1/ placer le dossier src/ (ou laravel-package ou autre nom) à la racine ./

    2/ spécifier le namespace à la racine de ./src/ dans ./composer.json
    
        "autoload": {
            "psr-4": {
                ...
                "MainNamespace\\": "src/",
                ...

    3/ Installer le vendor: lancer composer via docker

        docker-compose  -f ./src/docker/docker-compose.yml build
        docker-compose  -f ./src/docker/docker-compose.yml up

    4/ dump autoload:
        
        via le container docker composer:
            docker-compose  -f ./src/docker/docker-compose-autoload.yml build
            docker-compose  -f ./src/docker/docker-compose-autoload.yml up
        
        via artisan:
            php artisan composer:dumpautoload

------------------------------------------------------------------------

Provider: 
    ajouter le provider dans config/app.php

        config/app.php
            'providers' => [
                ...
                MainServiceProvider::class
    


------------------------------------------------------------------------

Documentation Api:

    Déplacer la Documentation Swagger dans le public folder:
         A la racine du projet:
    
            mv ./laravel-package/public/docs ./public


------------------------------------------------------------------------

Configurer les secrets dans le .env: 

 
    
        DB_CONNECTION=mysql
        DB_DATABASE=cms_headless
        DB_HOST=192.168.0.21
        DB_PORT=3094
        DB_USERNAME=root
        DB_PASSWORD=wg2bAQhd36aJ


------------------------------------------------------------------------


Database:


    create migration:

        php artisan make:migration add_page_route_relation --table --path=./laravel-package/Database/migrations/

        create table:

           php artisan  database:make  'table_name' --create

        update table:

            php artisan  database:make  'table_name' --table

    Migrate Tables: 


        php artisan migrate:refresh --path=./laravel-package/Database/migrations/

        php artisan migrate:refresh --path=./laravel-package/Database/migrations/2023_01_16_113911_add_page_route_relation.php

        all:
            php artisan database:migrate

        by filename:
            php artisan database:migrate --name=2023_01_04_213214_create_template_table.php
            php artisan database:migrate --name=2023_01_04_213241_create_page_table.php
            php artisan database:migrate --name=2023_01_04_213242_create_route_table.php

    Seed Tables:
        all:
            php artisan database:seeder

        by filename:
            php artisan database:seeder --seeder=PageSeeder
            php artisan database:seeder --seeder=TemplateSeeder
            php artisan database:seeder --seeder=RouteSeeder


    rollback:

        php artisan migrate:rollback

        php artisan migrate:rollback --step=1

        php artisan migrate:reset




