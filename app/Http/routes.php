<?php

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

  // Rotas de autenticação
  Route::auth();

  // Rotas para tarefas
  Route::get('/', 'TaskController@index');
  Route::get('/tasks', 'TaskController@index');
  Route::post('/task', 'TaskController@store');
  Route::delete('/task/{task}', 'TaskController@destroy');

});

