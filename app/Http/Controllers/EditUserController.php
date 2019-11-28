<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EditUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $usuario = Auth::user();

        
        if ( ! $request->newpass == '' and strlen($request->newpass) >= 8)
        {
            if($request->newpass == $request->confirmpass){
                $usuario->password = bcrypt($request->newpass); 
            }else{
                return redirect()->route('painel')->with('message', 'As senhas precisam ser iguais.');    
            }
            
        }else{
            return redirect()->route('painel')->with('message', 'Preencha o campo com no mínimo 8 caracteres');    
        }

        $usuario->save();
        
        
        return redirect()->route('painel')->with('message', 'Senha alterada sucesso!');
    }
}
