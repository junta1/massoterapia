<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {

    /**
     * Responds to requests to GET /users
     */
    public function index() {
        $pais = DB::select('select * from tb_pais');
        
        return view('dashboard.index');
    }

}
