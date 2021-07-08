<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{   
    //definir qual tabela é:
    
    //PROTECTED $TABLE = 'fornecedores';

    /*$insert->nome = 'nome';
    $insert->site = 'google.com';
    $insert->uf = 'MG';
    $insert->email = 'henriquepro8@gmail.com';
    */


    use HasFactory;
}
