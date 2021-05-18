<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(){
        $users = User::all();
        return view('users.index')->with(compact('users'));
    }

    public function create(){
        return view('users/create');
    }

    public function insert(Request $request){
        $datos = $request->except('_token');
        $user = User::create($datos);
        return redirect('users/index');
    }

    public function edit($id){
        $user = User::find($id);
        return view('users/edit' , compact('user') );
    }

    public function update(Request $request){  
        $datos = User::find($request->id);
        $datos->name = $request->name;        
        $datos->email = $request->email;
        $datos->password = $request->password;
        $datos->save();

        return redirect ('users/index');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return redirect ('users/index');
    }



}