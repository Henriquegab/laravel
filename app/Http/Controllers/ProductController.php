<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\Unidade;
use App\Models\Item;
use App\Models\ProdutoDetalhe;
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

        
            $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);
            /*    
           foreach ($produtos as $key => $produto) {
              // print_r($produto->getAttributes());
               echo '<br><br>' ;
                $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

                if(isset($produtoDetalhe)){

                    print_r($produtoDetalhe->getAttributes());

                    $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                    $produtos[$key]['largura'] = $produtoDetalhe->largura;
                    $produtos[$key]['altura'] = $produtoDetalhe->altura;
                }
               // echo'<hr>';
           }
           */
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
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
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
            'unidade_id' => 'exists:produtos,unidade_id',
            'fornecedor_id' => 'exists:fornecedors,id'



        ];

        $feedback = [
              'required' => 'O campo :attribute deve ser preenchido',
              'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
              'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
              'descricao.min' => 'O campo descricao deve ter no mínimo 3 caracteres',
              'descricao.max' => 'O campo descricao deve ter no máximo 2000 caracteres',
              'peso.integer' => 'O campo peso deve ser um número inteiro',
              'unidade_id.exists' => 'A unidade de medida informada não existe',
              'fornecedor_id.exists' => 'Por favor, Selecione um Fornecedor!'



        ];

        $request->validate($regras, $feedback);
        Item::create($request->all());

        /*

        Se quiser ir um por um em vez de todos pelo metodo create
        
        $produto = new Produto);         
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
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        
        return view('app.produto.show', ['produto' => $produto]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
       return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
       //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
       // $request->all(); payload - são as informações que foram colocadas nesse formulário agora
       // $produto; //instancia do objeto no estado anterior - São as informações que estão no banco de dados

       $regras = [ 

        'nome' => 'required|min:3|max:40',
        'descricao' => 'required|min:3|max:2000',
        'peso' => 'required|integer',
        'unidade_id' => 'exists:produtos,unidade_id',
        'fornecedor_id' => 'exists:fornecedors,id'




    ];

    $feedback = [
          'required' => 'O campo :attribute deve ser preenchido',
          'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
          'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
          'descricao.min' => 'O campo descricao deve ter no mínimo 3 caracteres',
          'descricao.max' => 'O campo descricao deve ter no máximo 2000 caracteres',
          'peso.integer' => 'O campo peso deve ser um número inteiro',
          'unidade_id.exists' => 'A unidade de medida informada não existe',
          'fornecedor_id.exists' => 'Por favor, Selecione um Fornecedor!'



    ];

    $request->validate($regras, $feedback);
    //Produto::create($request->all());


      
       $produto->update($request->all());
       return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        echo 'destroy';
        $produto->delete();
        return redirect()->route('produto.index', ['produto' => $produto->id]);

    }
}
