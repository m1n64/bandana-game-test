ln -s ./backend/.env .env

php artisan l5-swagger:generate

root@3bf144233a28:/var/www/html# chmod 777 storage/logs/ -R
root@3bf144233a28:/var/www/html# chmod 777 storage/ -R