<?php
/*
 * This file has been generated automatically.
 * Please change the configuration for correct use deploy.
 */

require 'recipe/laravel.php';

// Set configurations
set('repository', 'git@github.com:marc1404/DHBW-Summercamp.git');
set('shared_files', ['.env']);
set('shared_dirs', [
    'storage/app',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
    'node_modules'
]);
set('writable_dirs', ['bootstrap/cache', 'storage', 'node_modules']);

// Configure servers
serverList('servers.yml');

task('deploy:bower', function () {
    cd('{{release_path}}');
    run('bower install');
});

task('deploy:npm', function () {
    cd('{{release_path}}');
    run('npm install');
});

task('deploy:migrate', function () {
    cd('{{release_path}}');
    run('php artisan migrate');
});

task('deploy:build', function () {
    cd('{{release_path}}');
    run('npm run prod');
});

task('deploy:php-fpm', function () {
    run('sudo /etc/init.d/php7.0-fpm restart');
});

after('deploy', 'deploy:bower');
after('deploy', 'deploy:npm');
after('deploy', 'deploy:migrate');
after('deploy:npm', 'deploy:build');
after('deploy:build', 'deploy:php-fpm');