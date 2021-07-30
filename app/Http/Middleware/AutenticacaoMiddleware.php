<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $mensagem)
    {       

        session_start();

        if(isset($_SESSION['email'])&& $_SESSION['email']!=''){

            return $next($request);
        
        }
        else{

            return redirect()->route('site.login', ['erro' => 2]);

        }
        
    }
}
