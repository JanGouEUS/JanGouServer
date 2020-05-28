/*
    |--------------------------------------------------------------------------
    | Modeloa Kontroladorea eta Migrazioa sortzeko
    |--------------------------------------------------------------------------
 
*/

php artisan make:model izena -mcr

/*
    |--------------------------------------------------------------------------
    | VUE string-ak SORTZEKO
    |--------------------------------------------------------------------------
 
*/

php artisan vue-i18n:generate


npm install sweetalert2

composer require martinlindhe/laravel-vue-i18n-generator --dev

    /home/jangoueu/jangouserver/JangouServer/public/storage
    
    ln -s /home/jangoueu/jangouserver/JangouServer/storage/app/public /home/jangoueu/public_html

    unlink /home/jangoueu/public_html/storage
