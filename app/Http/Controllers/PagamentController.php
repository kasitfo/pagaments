<?php

namespace App\Http\Controllers;
use App\Pagament;
use App\Categoria;
use App\Compte;
use Auth;

use Illuminate\Http\Request;

class PagamentController extends Controller
{
    public function index(){
        $pagaments = Pagament::all();
        return view('pagaments.index')->with(compact('pagaments'));
    }

    protected function validator($data){
        return $data->validate([
            'titol' => ['required', 'string', 'max:150'],
            'descripcio' => ['required'],
            'preu' => ['required'],
            'data_inici' => ['required'],
            'data_fi' => ['required'],
            'estat' => ['required']
        ]);
    }

    public function create(){
        $categories = Categoria::all();
        $comptes = Compte::all();
        return view ('pagaments.create')->with(compact('categories', 'comptes'));
    }

    public function insert(Request $request){ 
        $this->validator($request);   
        $datos = $request->except('_token');
        $user = Auth::user();
        $datos['user_id'] = $user->id ;
        $pagament = Pagament::create($datos);
        return redirect ('pagaments/index');
    }

    public function edit($id){
        $pagament = Pagament::find($id);
        $categories = Categoria::all();
        $comptes = Compte::all();
        return view('pagaments/edit' , compact('pagament','categories', 'comptes') );
    }

    public function update(Request $request){  
        $this->validator($request); 
        $datos = Pagament::find($request->id);
        $datos->titol = $request->titol;        
        $datos->descripcio = $request->descripcio;
        $datos->preu = $request->preu;
        $datos->data_inici = $request->data_inici;
        $datos->data_fi = $request->data_fi;
        $datos->categoria_id = $request->categoria_id;
        $datos->compte_id = $request->compte_id;
        $datos->estat = $request->estat;
        $datos->save();

        return redirect ('pagaments/index');
    }

    public function delete($id){
        $pagament = Pagament::find($id);
        $pagament->delete();

        return redirect ('pagaments/index');
    }

    public function show($id){
        $pagament = Pagament::find($id);
        return View('pagaments.show')->with(compact('pagament'));
    }
}
