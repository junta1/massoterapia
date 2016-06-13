<?php

Route::post('medida-paciente/search','\App\Massoterapia\MedidaPaciente\Http\Controllers\MedidaPacienteController@search');

Route::resource('medida-paciente', '\App\Massoterapia\MedidaPaciente\Http\Controllers\MedidaPacienteController');
