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

    protected function validator($data){
        return $data->validate([
            'curs' => ['required', 'string', 'max:50']
        ]);
    }

    public function create(){
        return view ('cursos.create');
    }

    public function insert(Request $request){   
        $this->validator($request); 
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
        $this->validator($request); 
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
