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
]);
set('writable_dirs', ['bootstrap/cache', 'storage']);

// Configure servers
server('production', '193.196.7.10')
    ->user('username')
    ->password()
    ->env('deploy_path', '/home/vornetran/production');

server('development', '193.196.7.10')
    ->user('vornetran')
    ->password()
    ->env('deploy_path', '/home/vornetran/development');

server('berkling', '193.196.7.10')
    ->user('vornetran')
    ->password()
    ->env('deploy_path', '/home/vornetran/berkling');

task('deploy:bower', function () {
    cd('{{release_path}}');
    run('bower install');
});

task('deploy:npm', function () {
    cd('{{release_path}}');
    run('npm install');
});

task('deploy:build', function () {
    cd('{{release_path}}');
    run('npm run prod');
});

after('deploy', 'deploy:bower');
after('deploy', 'deploy:npm');
after('deploy:npm', 'deploy:build');