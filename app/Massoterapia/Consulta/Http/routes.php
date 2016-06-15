<?php

Route::post('consulta/search','\App\Massoterapia\Consulta\Http\Controllers\ConsultaController@search');

Route::resource('consulta','\App\Massoterapia\Consulta\Http\Controllers\ConsultaController');
