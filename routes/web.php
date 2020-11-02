<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/github-hook', function ()
{
    system('cd ~');
    system('cd /var/www/html');
    system('sudo git pull --force');
    system('sudo composer install');
    system('sudo npm run dev');
});
