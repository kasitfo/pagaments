<?php

namespace App\Http\Controllers;
use App\Curs;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;

class CursController extends Controller
{
    public function index(){
        $cursos = Curs::all();
        return view ('cursos.index')->with(compact('cursos'));
    }

    public function create(){
        return view ('cursos.create');
    }

    public function insert(Request $request){   
        $datos = $request->except('_token');
        $user = Auth::user();
        $datos['user_id'] = $user->id ;
        $curs = Curs::create($datos);
        return redirect ('cursos/index');
    }

    public function edit($id){
        $curs = Curs::find($id);
        return view('cursos/edit' , compact('curs') );
    }

    public function update(Request $request){  
        $datos = Curs::find($request->id);
        $datos->curs = $request->curs;
        $datos->save();

        return redirect ('cursos/index');
    }

    public function delete($id){
        $curs = Curs::find($id);
        $curs->delete();

        return redirect ('cursos/index');
    }
}
