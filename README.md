## How to install

<p>1 ) git clone https://github.com/devyoudu/api.git</p>
<p>2 ) git checkout master</p>
<p>3 ) composer install</p>
<p>4 ) cp .env.example .env</p>
<p>5 ) sudo nano .env</p>
<p></p>    
<p>    Change:</p>
<p></p>
<p>    DB_CONNECTION=mysql</p>
<p>    DB_HOST=127.0.0.1</p>
<p>    DB_PORT=3306</p>
<p>    DB_DATABASE=mlonline</p>
<p>    DB_USERNAME=root</p>
<p>    DB_PASSWORD=Valor123!!</p>
<p></p>
<p>    And</p>
<p></p>
<p>    API_MARCALASER=marcalaser.local/api/</p>
<p></p>
<p></p>
<p>6 ) php artisan migrate</p>
<p>7 ) php artisan db:seed</p>
<p>8 ) php artisan passport:install</p>
<p>8 ) php artisan key:generate</p>
<p>9 ) sudo chmod 777 -R storage</p>
