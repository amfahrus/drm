#!/usr/bin/env bash

function info {
  echo " "
  echo "--> $1"
  echo " "
}

apt-get update

sudo apt-get install -y nginx php5-fpm php5-gd php5-cli php-apc php5-pgsql postgresql-9.3

info "Configure PostgreSL"
sudo sed -i "s/#listen_addresses = 'localhost'/listen_addresses = '*'/g" /etc/postgresql/9.3/main/postgresql.conf
sudo sed -i "s=127.0.0.1/32=0.0.0.0/0=g" /etc/postgresql/9.3/main/pg_hba.conf
sudo -u postgres psql -U postgres -d postgres -c "ALTER USER postgres WITH ENCRYPTED PASSWORD 'postgres';"
sudo -u postgres psql -U postgres -d postgres -c "CREATE DATABASE abipraya WITH OWNER = postgres ENCODING = 'UTF8' TABLESPACE = pg_default LC_COLLATE = 'en_US.UTF-8' LC_CTYPE = 'en_US.UTF-8' CONNECTION LIMIT = -1;"
sudo -u postgres psql -U postgres -d postgres -c "CREATE ROLE eproc LOGIN ENCRYPTED PASSWORD 'md5031d3f3e6cece35bcc67a70b76a05bb7' SUPERUSER INHERIT NOCREATEDB NOCREATEROLE NOREPLICATION; ALTER ROLE eproc IN DATABASE abipraya SET search_path = eproc;"
sudo -u postgres psql -U postgres -d abipraya < /app/vagrant/sql/db.sql
echo "Done!"

info "Install Adminer"
sudo mkdir -p /usr/share/nginx/html/adminer
sudo wget http://www.adminer.org/latest.php -O /usr/share/nginx/html/adminer/index.php
sudo ln -s /app/vagrant/nginx/adminer.conf /etc/nginx/sites-enabled/adminer.conf
sudo cp /app/vagrant/sql/db.sql /usr/share/nginx/html/adminer/adminer.sql
echo "Done!"

info "Configure PHP-FPM"
sudo sed -i 's/user = www-data/user = vagrant/g' /etc/php5/fpm/pool.d/www.conf
sudo sed -i 's/group = www-data/group = vagrant/g' /etc/php5/fpm/pool.d/www.conf
sudo sed -i 's/owner = www-data/owner = vagrant/g' /etc/php5/fpm/pool.d/www.conf
echo "Done!"

info "Configure NGINX"
sudo sed -i 's/user www-data/user vagrant/g' /etc/nginx/nginx.conf
echo "Done!"

info "Enabling site configuration"
sudo ln -s /app/vagrant/nginx/app.conf /etc/nginx/sites-enabled/app.conf
echo "Done!"

info "Restart web-stack"
sudo service php5-fpm restart
sudo service nginx restart
sudo service postgresql restart
echo "Done!"
