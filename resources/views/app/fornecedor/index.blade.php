<h1>
Fornecedores aiai

</h1>

@php




@endphp

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    
    <br>
    CPNJ: {{$fornecedores[0]['cnpj'] ?? $facada}}
@endisset


