<?php

namespace App\Http\Controllers;

use App\Compte;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;


class CompteController extends Controller
{
    /**
     * Ens retorna la vista comptes/index
     * @return View
     */
    public function index(){
        $comptes = Compte::all();
        return view('comptes.index')->with(compact('comptes'));
    }

    /**
     * Funció que ens valida desde el backend els camps que ens arriben per request
     * @param Array $data
     * @return View
     */
    protected function validator($data){
        return $data->validate([
            'compte' => ['required', 'string', 'max:150'],
            'fuc' => ['required', 'string', 'max:150'],
            'clau' => ['required', 'string', 'max:50'],

        ]);
    }

    /**
     * Ens retorna la vista comptes/create
     * @return View
     */
    public function create(){
        return view ('comptes.create');
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
        $compte = Compte::create($datos);
        return redirect ('comptes/index');
    }

    /**
     * Ens carrega la vista comptes/edit amb els camps de l'id que li hem passat
     * @param int $id
     * @return View
     */
    public function edit($id){
        $compte = Compte::find($id);
        return view('comptes/edit' , compact('compte') );
    }

    /**
     * Ens fa un update de la entrada que estavem modificant i ho guardem a la taula.
     * @param Request $request
     * @return View
     */
    public function update(Request $request){ 
        $this->validator($request); 
        $datos = Compte::find($request->id);
        $datos->compte = $request->compte;
        $datos->fuc = $request->fuc;
        $datos->clau = $request->clau;
        $datos->save();

        return redirect ('comptes/index');
    }

    /**
     * Ens borra la instancia que hem clicat
     * @param int $id
     * @return View
     */
    public function delete($id){
        $compte = Compte::find($id);
        $compte->delete();

        return redirect ('comptes/index');
    }
}
