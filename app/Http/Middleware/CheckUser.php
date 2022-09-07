<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Usuario;

class CheckUser
{
    public function handle(Request $request, Closure $next)
    {         
        $user=session('user_name');
    	$pass=session('password'); 
        $usuario = Usuario::where(['USU_CODIGO'=>$user,'USU_CLAVE'=>$pass])->first();
        if($usuario){
            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}
