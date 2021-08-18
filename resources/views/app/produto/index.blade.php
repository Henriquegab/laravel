@extends('app.layouts.basico')


@section('titulo', 'Produtos')


@section('conteudo')


    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
                <li><a href="">Listar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>    
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                         @foreach ($produtos as $produto)
                            <tr>    
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->unidade_id}}</td>
                                <td>{{ $produto->comprimento ?? '' }}</td>
                                <td>{{ $produto->altura ?? '' }}</td>
                                <td>{{ $produto->largura ?? '' }}</td>
                                <td>
                                
                                    <form action="{{ route('produto.show', ['produto' => $produto->id]) }}">
                                        <button type="submit" class="borda-preta">Visualizar</button>
                                    </form>
                                
                                </td>
                                <td>
                                    
                                    <form method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="borda-preta">Excluir</button>
                                    </form>
                            
                                </td>
                                <td>
                                    <form action="{{ route('produto.edit', ['produto' => $produto->id]) }}">
                                        <button type="submit" class="borda-preta">Editar</button>
                                    </form>
                                
                                </td>
                            </tr>
                         @endforeach
                    </tbody>
               
                    
                </table>
                    {{ $produtos->appends($request)->links() }}

                    <br>

                   
                    <br>
                    <br>
                   
                    
            </div>
        </div>
    </div>


@endsection