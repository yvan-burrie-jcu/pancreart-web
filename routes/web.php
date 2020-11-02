<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function ()
{
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/github-hook', function (Request $request)
{
    // Only to be used by server and not local machine
    system('cd ~');
    system('cd /var/www/html');
    system('sudo git pull --force');
    system('sudo composer install');
    system('sudo npm run dev');
    system('php artisan migrate');

    response();
});
