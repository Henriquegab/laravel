@extends('app.layouts.basico')


@section('titulo', 'Pedido')


@section('conteudo')


    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
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
                            
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                         @foreach ($pedidos as $pedido)
                            <tr>    
                                <td>{{$pedido->id}}</td>
                                <td>{{$pedido->cliente_id}}</td>
                                <td>

                                    <form action="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                        <button type="submit" class="borda-preta">Adicionar Produtos</button>
                                    </form>

                                </td>
                               
                                <td>
                                
                                    <form action="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">
                                        <button type="submit" class="borda-preta">Visualizar</button>
                                    </form>
                                
                                </td>
                                <td>
                                    
                                    <form method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="borda-preta">Excluir</button>
                                    </form>
                            
                                </td>
                                <td>
                                    <form action="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">
                                        <button type="submit" class="borda-preta">Editar</button>
                                    </form>
                                
                                </td>
                            </tr>
                         @endforeach
                    </tbody>
               
                    
                </table>
                    {{ $pedidos->appends($request)->links() }}

                    <br>

                   
                    <br>
                    <br>
                   
                    
            </div>
        </div>
    </div>


@endsection