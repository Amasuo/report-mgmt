rename .env.example to .env  
add database infos in .env  
composer install  
php artisan key:generate  
php artisan migrate:fresh --seed  
php artisan serve
