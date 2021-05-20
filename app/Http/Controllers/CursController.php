<?php

namespace App\Http\Controllers;
use App\Curs;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;

class CursController extends Controller
{
    /**
     * Ens retorna la vista cursos/index
     * @return View
     */
    public function index(){
        $cursos = Curs::all();
        return view ('cursos.index')->with(compact('cursos'));
    }

    /**
     * Funció que ens valida desde el backend els camps que ens arriben per request
     * @param Array $data
     * @return View
     */
    protected function validator($data){
        return $data->validate([
            'curs' => ['required', 'string', 'max:50']
        ]);
    }

    /**
     * Ens retorna la vista cursos/create
     * @return View
     */
    public function create(){
        return view ('cursos.create');
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
        $curs = Curs::create($datos);
        return redirect ('cursos/index');
    }

    /**
     * Ens carrega la vista cursos/edit amb els camps de l'id que li hem passat
     * @param int $id
     * @return View
     */
    public function edit($id){
        $curs = Curs::find($id);
        return view('cursos/edit' , compact('curs') );
    }

    /**
     * Ens fa un update de la entrada que estavem modificant i ho guardem a la taula.
     * @param Request $request
     * @return View
     */
    public function update(Request $request){ 
        $this->validator($request); 
        $datos = Curs::find($request->id);
        $datos->curs = $request->curs;
        $datos->save();

        return redirect ('cursos/index');
    }

    /**
     * Ens borra la instancia que hem clicat
     * @param int $id
     * @return View
     */
    public function delete($id){
        $curs = Curs::find($id);
        $curs->delete();

        return redirect ('cursos/index');
    }

    /**
     * Ens imprimeix el CRUD en qüestió
     */
    public function imprimir(){
        $cursos = Curs::all();
        $filename = "Cursos.pdf";
        $file = base_path().'/storage/'.$filename;
        $view = View::Make( 'cursos/imprimir' , compact('cursos') )->render();
        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->loadHTML($view);
        $output = $pdf->output();
        file_put_contents($file, $output);

        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename"'.$filename.'"');
        readfile($file);
    }
}
