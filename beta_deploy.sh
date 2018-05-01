#!/usr/bin/env bash

# Trigger deployment
# This will trigger an update of beta on a successful build
#curl -s 'https://forge.laravel.com/servers/102862/sites/238869/deploy/http?token=VNCss4wCcwJGbqUrZWu2EWI4H6hDIIOxpCVDDPtZ';
# This will update the beta code at the rda subdomain
#curl -s 'https://forge.laravel.com/servers/102862/sites/471050/deploy/http?token=MuYNzkjNrHfdZV3Cz3jXFRs6th0Fm3DFhxLxTAUc';
#echo 'Deployment triggered!'
cd /home/rda.metadataregistry.org
git pull origin beta

composer install --no-interaction --prefer-dist --optimize-autoloader
php artisan migrate --force
php artisan view:clear
php artisan config:cache
yarn
npm run production
php symfony cc
