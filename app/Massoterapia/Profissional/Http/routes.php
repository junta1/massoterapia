<?php

Route::post('profissional/search','\App\Massoterapia\Profissional\Http\Controllers\ProfissionalController@search');

Route::resource('profissional','\App\Massoterapia\Profissional\Http\Controllers\ProfissionalController');

