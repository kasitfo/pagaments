<?php

namespace App\Http\Controllers;
use App\Curs;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class CursController extends Controller
{
    public function index(){
        return view('cursos/index');
    }
    
    public function create(){
        return view('cursos/create');
    }

    public function add(Request $request){
Log::info($request);        
    }
}
