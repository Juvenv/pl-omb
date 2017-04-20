<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Busca arquivos de rotas dentro da pasta 'app/routes' e une aqui
foreach ( File::allFiles(__DIR__.'/routes') as $partial ){
    require $partial->getPathname();
}

// Qualquer rota dentro de admin precisa passar por autenticação
Route::when('admin/*', 'auth.basic');
Route::delete('teste/{id}', 'UnitController@deleteOrRestore');
