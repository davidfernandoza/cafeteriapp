release: bash ./deploy.sh

web: vendor/bin/heroku-php-apache2 public/
heroku buildpacks:add --index 1 heroku/nodejs
heroku config:set NPM_CONFIG_PRODUCTION=false
