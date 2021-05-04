<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Curs;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;

class CategoriaController extends Controller
{
    public function index(){
        $categories = Categoria::all();
        return view ('categories.index')->with(compact('categories'));
    }

    public function create(){
        $cursos = Curs::all();
        return view ('categories.create')->with(compact('cursos'));
    }

    public function insert(Request $request){   
        $datos = $request->except('_token');   
        $user = Auth::user();
        $datos['user_id'] = $user->id ;
        $categories = Categoria::create($datos);

        return redirect ('categories/index');
    }

    public function edit($id){
        $categoria = Categoria::find($id);
        $cursos = Curs::all();
        return view('categories/edit' , compact('categoria', 'cursos') );
    }

    public function update(Request $request){  
        $datos = Categoria::find($request->id);
        $datos->categoria = $request->categoria;
        $datos->curs_id = $request->curs_id;
        $datos->save();

        return redirect ('categories/index');
    }

    public function delete($id){
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect ('categories/index');
    }


}
