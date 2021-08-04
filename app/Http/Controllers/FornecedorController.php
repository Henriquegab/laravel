<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){
        
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->get();
       
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request){

        $msg = '';
        if($request->input('_token') != ''){

            

            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'


            ];

            $feedback = [


                'required' => 'O campo :attribute é obrigatório',
                'nome.min' => 'O campo :attribute deve ter ao menos 3 caracteres!',
                'nome.max' => 'O campo :attribute deve ter no máximo 40 caracteres!',
                'uf.min' => 'O campo :attribute deve ter ao menos 2 caracteres!',
                'uf.max' => 'O campo :attribute deve ter no máximo 2 caracteres!',
                'email' => 'O email é obrigatório'

            ];

            $request->validate($regras, $feedback);

            echo 'chegamos aqui!';

            $fornecedor = new Fornecedor;
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';

        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
    public function editar($id){
        echo($id);
        return view('app.fornecedor.index');
    }

}
