<?php

namespace App\Http\Controllers;

use App\Compte;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;


class CompteController extends Controller
{
    public function index(){
        $comptes = Compte::all();
        return view('comptes.index')->with(compact('comptes'));
    }

    protected function validator($data){
        return $data->validate([
            'compte' => ['required', 'string', 'max:150'],
            'fuc' => ['required', 'string', 'max:150'],
            'clau' => ['required', 'string', 'max:50'],

        ]);
    }

    public function create(){
        return view ('comptes.create');
    }

    public function insert(Request $request){ 
        $this->validator($request);  
        $datos = $request->except('_token');
        $user = Auth::user();
        $datos['user_id'] = $user->id ;
        $compte = Compte::create($datos);
        return redirect ('comptes/index');
    }

    public function edit($id){
        $compte = Compte::find($id);
        return view('comptes/edit' , compact('compte') );
    }

    public function update(Request $request){ 
        $this->validator($request); 
        $datos = Compte::find($request->id);
        $datos->compte = $request->compte;
        $datos->fuc = $request->fuc;
        $datos->clau = $request->clau;
        $datos->save();

        return redirect ('comptes/index');
    }

    public function delete($id){
        $compte = Compte::find($id);
        $compte->delete();

        return redirect ('comptes/index');
    }
}
