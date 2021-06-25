<h1>
Fornecedores aiai

</h1>

@php




@endphp

@isset($fornecedores)
    @forelse ($fornecedores as $indice => $fornecedor)
        Interação atual: {{ $loop->iteration }}
        <br>
        
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        
        <br>
        CPNJ: {{$fornecedor['cnpj'] ?? $facada}}
        <br>
        @if($loop->last)
            urtima interação
            <br>
            Total de Registros: {{ $loop->count }}
        @endif
        <hr>
    @empty
        Não tem mermão!
    @endforelse
@endisset

<br>



