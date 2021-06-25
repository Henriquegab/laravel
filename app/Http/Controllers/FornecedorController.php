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
                'cnpj' => '0', 
                'ddd'=> '38', 
                'telefone' =>'4002-8922'
            ],
                1 => [
                    'nome'=>'Fornecedor 2',
                    'status' => 'S',
                    'cnpj' => '123', 
                    'ddd'=> '15', 
                    'telefone' =>'4028-0484'
                ],
                2 => [
                    'nome'=>'Fornecedor 3',
                    'status' => 'S', 
                    'cnpj' => '5894', 
                    'ddd'=> '21', 
                    'telefone' =>'8866-4847'
                    ]

        ];

        
        /*$msg = isset($fornecedores[0]['cpnj']) ? 'CNPJ informado!' : 'CNPJ não existe mermão!';
        echo $msg;*/


        $facada = 'pera lá né amigão';

        return view('app.fornecedor.index', compact('fornecedores', 'facada'));
    }
}
