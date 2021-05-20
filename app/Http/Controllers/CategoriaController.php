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
    /**
     * Ens retorna la vista categories/index
     * @return View
     */
    public function index(){
        $categories = Categoria::all();
        return view ('categories.index')->with(compact('categories'));
    }

    /**
     * Funció que ens valida desde el backend els camps que ens arriben per request
     * @param Array $data
     * @return View
     */
    protected function validator($data){
        return $data->validate([
            'categoria' => ['required', 'string', 'max:150']
        ]);
    }

    /**
     * Ens retorna la vista categories/create
     * @return View
     */
    public function create(){
        $cursos = Curs::all();
        return view ('categories.create')->with(compact('cursos'));
    }

    /**
     * Funció que ens inserta els camps introduïts en el formulari a la taula.
     * @param Request $request
     * @return View
     */
    public function insert(Request $request){  
        $this->validator($request); 
        $datos = $request->except('_token');   
        $user = Auth::user();
        $datos['user_id'] = $user->id ;
        $categories = Categoria::create($datos);

        return redirect ('categories/index');
    }

    /**
     * Ens carrega la vista categories/edit amb els camps de l'id que li hem passat
     * @param int $id
     * @return View
     */
    public function edit($id){
        $categoria = Categoria::find($id);
        $cursos = Curs::all();
        return view('categories/edit' , compact('categoria', 'cursos') );
    }

    /**
     * Ens fa un update de la entrada que estavem modificant i ho guardem a la taula.
     * @param Request $request
     * @return View
     */
    public function update(Request $request){  
        $this->validator($request); 
        $datos = Categoria::find($request->id);
        $datos->categoria = $request->categoria;
        $datos->curs_id = $request->curs_id;
        $datos->save();

        return redirect ('categories/index');
    }

    /**
     * Ens borra la instancia que hem clicat
     * @param int $id
     * @return View
     */
    public function delete($id){
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect ('categories/index');
    }

    /**
     * Ens retorna el menu en de l'inici
     * @return HTMLString
     */
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

    /**
     * Ens imprimeix el CRUD en qüestió
     */
    public function imprimir(){
        $categories = Categoria::all();
        $filename = "Categories.pdf";
        $file = base_path().'/storage/'.$filename;
        $view = View::Make( 'categories/imprimir' , compact('categories') )->render();
        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->loadHTML($view);
        $output = $pdf->output();
        file_put_contents($file, $output);

        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename"'.$filename.'"');
        readfile($file);
    }

}
