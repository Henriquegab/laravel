<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Fornecedor;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
            $produtos = Product::paginate(10);
                
           
            return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [ 

            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id'



        ];

        $feedback = [
              'required' => 'O campo :attribute deve ser preenchido',
              'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
              'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
              'descricao.min' => 'O campo descricao deve ter no mínimo 3 caracteres',
              'descricao.max' => 'O campo descricao deve ter no máximo 2000 caracteres',
              'peso.integer' => 'O campo peso deve ser um número inteiro',
              'unidade_id.exists' => 'A unidade de medida informada não existe'
              



        ];

        $request->validate($regras, $feedback);
        Product::create($request->all());

        /*

        Se quiser ir um por um em vez de todos pelo metodo create
        
        $produto = new Product();         
        $nome = $request->get('nome');
        $descricao = $request->get('descricao');
        $produto->nome = $nome;
        $produto->descricao = $descricao;

        $produto->save();
        */
        return redirect()->route('produto.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        echo 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        echo 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        echo 'destroy';
    }
}
