#!/bin/sh

# ********************************************
# RUN THIS SECTION ONLY IN PRODUCTION MACHINE
# ********************************************

# Install web server packages
curl -sL https://deb.nodesource.com/setup_18.x -o nodesource_setup.sh && sudo bash nodesource_setup.sh && sudo apt update && sudo apt install nodejs -y && rm nodesource_setup.sh;
sudo apt install -y composer git php-mbstring php-imagick php-bcmath php-xml php-fpm php-zip php-intl php-gd php-common php-fpm php-cli unzip curl php-curl nginx redis php-redis mysql-server php-mysql;

# Database Server Setup
sudo mysql -u root -p;

# Create DB and set DB user privileges
CREATE DATABASE emojisource;
CREATE USER 'emojisource'@'localhost' IDENTIFIED BY 'Bahia#9398!!';
ALTER USER 'emojisource'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Emoj1$ourc3';
GRANT ALL PRIVILEGES ON emojisource.* to 'emojisource'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
exit;

# Setting Folder Permissions
sudo chgrp -R www-data . ;
sudo chown -R www-data:www-data storage;
sudo chown -R www-data:www-data bootstrap/cache;
chmod -R 775 ./storage;
chmod -R 775 bootstrap/cache;

composer install && composer update;
npm install && npm update;

# Create Nginx File
sudo nano /etc/nginx/sites-available/emojisource

# File content starts here
server {
    listen 80;
    server_name emojisource.localhost; # Edit this
    root /home/elvis/Projects/emojisource/public; # Edit this

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    client_max_body_size 100M;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock; # Replace with correct PHP version information
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # Enable gzip compression
    gzip on;
    gzip_comp_level 5;
    gzip_min_length 256;
    gzip_proxied any;
    # Compress all output labeled with one of the following MIME-types.
    gzip_types
      application/atom+xml
      application/javascript
      application/json
      application/ld+json
      application/manifest+json
      application/rss+xml
      application/vnd.geo+json
      application/vnd.ms-fontobject
      application/x-font-ttf
      application/x-web-app-manifest+json
      application/xhtml+xml
      application/xml
      font/opentype
      image/bmp
      image/svg+xml
      image/x-icon
      text/cache-manifest
      text/css
      text/plain
      text/vcard
      text/vnd.rim.location.xloc
      text/vtt
      text/x-component
      text/x-cross-domain-policy;
}

# File content ends here

# Enable NGINX Site
sudo ln -s /etc/nginx/sites-available/emojisource /etc/nginx/sites-enabled/;
sudo rm /etc/nginx/sites-enabled/default;

# Restart Nginx Server
sudo systemctl restart nginx;

# Migrate database
php artisan migrate:fresh;

# Activate the Stripe client for development (requires Stripe-Cli)
stripe listen --forward-to linkd.localhost/stripe/webhook

git config --global user.email "elvisblanco1993@gmail.com";
git config --global user.name "Elvis Blanco Gonzalez";
