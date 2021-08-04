<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(){
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request){
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

        }
        return view('app.fornecedor.adicionar');
    }

}
