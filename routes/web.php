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
    system('cd ~');
    system('cd /var/www/html');
    system('sudo git pull --force');
    system('sudo composer install');
    system('sudo npm run dev');
});
