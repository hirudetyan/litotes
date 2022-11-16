mysql -e "SET PASSWORD = '123456';";
mysql -uroot -p123456 < litotes.sql;
composer install;
cp env .env;
wget https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1.php -O ./public/adminer.php;