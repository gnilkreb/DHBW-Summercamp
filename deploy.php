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

/**
 * Restart php-fpm on success deploy.
 */
task('php-fpm:restart', function () {
    // Attention: The user must have rights for restart service
    // Attention: the command "sudo /bin/systemctl restart php-fpm.service" used only on CentOS system
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo /bin/systemctl restart php-fpm.service');
})->desc('Restart PHP-FPM service');

task('setup', function () {
    run('npm install & bower install');
});

after('deploy', 'setup');
after('success', 'php-fpm:restart');