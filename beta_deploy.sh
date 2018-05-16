#!/usr/bin/env bash

# Trigger deployment
# This will trigger an update of beta on a successful build
#curl -s 'https://forge.laravel.com/servers/102862/sites/238869/deploy/http?token=VNCss4wCcwJGbqUrZWu2EWI4H6hDIIOxpCVDDPtZ';
# This will update the beta code at the rda subdomain
#curl -s 'https://forge.laravel.com/servers/102862/sites/471050/deploy/http?token=MuYNzkjNrHfdZV3Cz3jXFRs6th0Fm3DFhxLxTAUc';
#echo 'Deployment triggered!'

# cd /var/www/html/Metadata-Registry
# sudo git pull origin beta

# sudo composer install --no-interaction --prefer-dist --optimize-autoloader
# sudo php artisan migrate --force
# sudo php artisan view:clear
# sudo php artisan config:cache
# sudo yarn
# sudo npm run dev

#sudo php symfony cc

ls
cd /var/www/html/Metadata-Registry/
sudo git pull origin beta
