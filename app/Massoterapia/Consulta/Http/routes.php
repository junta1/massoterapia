<?php

Route::get('consulta-paciente','\App\Massoterapia\Consulta\Http\Controllers\ConsultaController@consulta');

Route::resource('consulta','\App\Massoterapia\Consulta\Http\Controllers\ConsultaController');

