<?php

Route::post('profissional-cargo/search','\App\Massoterapia\ProfissionalCargo\Http\Controllers\CargoProfissionalController@search');

//Definir a rota em RouteServiceProvider
Route::resource('profissional-cargo', '\App\Massoterapia\ProfissionalCargo\Http\Controllers\CargoProfissionalController');
