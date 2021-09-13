@extends('app.layouts.basico')


@section('titulo', 'Cliente')


@section('conteudo')


    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
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
                            
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                         @foreach ($clientes as $cliente)
                            <tr>    
                                <td>{{$cliente->nome}}</td>
                               
                                <td>
                                
                                    <form action="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">
                                        <button type="submit" class="borda-preta">Visualizar</button>
                                    </form>
                                
                                </td>
                                <td>
                                    
                                    <form method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="borda-preta">Excluir</button>
                                    </form>
                            
                                </td>
                                <td>
                                    <form action="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">
                                        <button type="submit" class="borda-preta">Editar</button>
                                    </form>
                                
                                </td>
                            </tr>
                         @endforeach
                    </tbody>
               
                    
                </table>
                    {{ $clientes->appends($request)->links() }}

                    <br>

                   
                    <br>
                    <br>
                   
                    
            </div>
        </div>
    </div>


@endsection