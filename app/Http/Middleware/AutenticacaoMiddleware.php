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

        echo $metodo_autenticacao.'<br>';
        echo $mensagem.'<br>';
        if(false)
        {
            return $next($request);

        }
        
        else{
            return Response('Acesso negado! Rota exige autenticação');
        }
        
    }
}
