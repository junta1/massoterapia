<?php

//Definir a rota em RouteServiceProvider
Route::post('paciente-cadastro/search', '\App\Massoterapia\PacienteCadastro\Http\Controllers\PacienteCadastroController@search');

Route::resource('paciente-cadastro', '\App\Massoterapia\PacienteCadastro\Http\Controllers\PacienteCadastroController');

