<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [
            0 => [
                'nome'=>'Fornecedor 1',
                'status' => 'N', 
                'ddd'=> '38', 
                'telefone' =>'4002-8922'
                ]
        ];

        
        /*$msg = isset($fornecedores[0]['cpnj']) ? 'CNPJ informado!' : 'CNPJ não existe mermão!';
        echo $msg;*/


        $facada = 'pera lá né amigão';

        return view('app.fornecedor.index', compact('fornecedores', 'facada'));
    }
}
