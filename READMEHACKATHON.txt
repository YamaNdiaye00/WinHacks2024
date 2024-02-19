1. You need php 8.2 or abovw
2. need npm
3. (Maybe) might need composer
4. uncomment the following in php.ini file
extension=openssl
extension=pdo_pgsql
extension=fileinfo
extension=zip
5. Rename .env.example to .env and put into root project folder, reconfigure database credentials in it (however, use pgsql)
6. run composer install
7. run npm install
8. run php artisan migrate
9. run php artisan serve
10. (optional) run "npm run dev" for dev mode
11. Enjoy