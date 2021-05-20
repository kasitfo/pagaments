<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Ens retorna la vista users/index
     * @return View
     */
    public function index(){
        $users = User::all();
        return view('users.index')->with(compact('users'));
    }

    /**
     * Ens retorna la vista users/create
     * @return View
     */
    public function create(){
        return view('users/create');
    }

    /**
     * Funció que ens inserta els camps introduïts en el formulari a la taula.
     * @param Request $request
     * @return View
     */
    public function insert(Request $request){
        $datos = $request->except('_token');
        $user = User::create($datos);
        return redirect('users/index');
    }

    /**
     * Ens carrega la vista users/edit amb els camps de l'id que li hem passat
     * @param int $id
     * @return View
     */
    public function edit($id){
        $user = User::find($id);
        return view('users/edit' , compact('user') );
    }

    /**
     * Ens fa un update de la entrada que estavem modificant i ho guardem a la taula.
     * @param Request $request
     * @return View
     */
    public function update(Request $request){  
        $datos = User::find($request->id);
        $datos->name = $request->name;        
        $datos->email = $request->email;
        $datos->password = $request->password;
        $datos->save();

        return redirect ('users/index');
    }

    /**
     * Ens borra la instancia que hem clicat
     * @param int $id
     * @return View
     */
    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return redirect ('users/index');
    }

    /**
     * Ens imprimeix el CRUD en qüestió
     */
    public function imprimir(){
        $users = User::all();
        $filename = "Usuaris.pdf";
        $file = base_path().'/storage/'.$filename;
        $view = View::Make( 'users/imprimir' , compact('users') )->render();
        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->loadHTML($view);
        $output = $pdf->output();
        file_put_contents($file, $output);

        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename"'.$filename.'"');
        readfile($file);
    }



}
