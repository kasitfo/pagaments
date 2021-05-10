<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Curs;
use App\Pagament;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;
use Illuminate\Support\HtmlString;

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

    public function showCategory(){
        $categories = Categoria::all();
        $h = "";
        foreach($categories as $categoria){
            $pagaments = Pagament::where('categoria_id', '=', $categoria->id)->get();
            $h.= "<li style='list-style:none'>";  
            $h.= "<a style='color:white; margin-left: 20px;' class='dropdown-toggle' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' href=''>".$categoria->categoria."</a>";
            $h.= "<div class='dropdown-menu'>";
            foreach($pagaments as $pagament){
                $h.= "<a class='dropdown-item' href='/pagaments/info/".$pagament->id."'>".$pagament->titol."</a>";
            }
            $h.= "</div>";
            $h.= "</li>";
        }
        return new HtmlString($h);
    }

}
