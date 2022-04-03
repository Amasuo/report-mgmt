# report-mgmt
## report-mgmt-api
rename .env.example to .env
add database infos in .env
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve

## report-mgmt-ui
npm install
npm run serve
