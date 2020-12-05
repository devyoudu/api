## How to install

1 ) git clone https://github.com/devyoudu/api.git
2 ) git checkout master
3 ) composer install
4 ) cp .env.example .env
5 ) sudo nano .env
    
    Change:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=mlonline
    DB_USERNAME=root
    DB_PASSWORD=Valor123!!


    And

    API_MARCALASER=marcalaser.local/api/


6 ) php artisan migrate
7 ) php artisan db:seed
8 ) php artisan passport:install
8 ) php artisan key:generate
9 ) sudo chmod 777 -R storage
