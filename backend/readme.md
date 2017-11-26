# back end

## Build Setup

``` bash
# install dependencies
npm install
composer install

# set db

php artisan migrate:refresh --seed
php artisan passport:install

# serve
php artisan serve
```


