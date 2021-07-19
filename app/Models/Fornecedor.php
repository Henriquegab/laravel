<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{   
    //definir qual tabela é:
    use SoftDeletes;
    protected $table = 'fornecedors';
    protected $fillable = ['nome', 'site', 'uf', 'email'];
    //PROTECTED $TABLE = 'fornecedores';

    /*$insert->nome = 'nome';
    $insert->site = 'google.com';
    $insert->uf = 'MG';
    $insert->email = 'henriquepro8@gmail.com';
    */

    //Fornecedor::create(['nome' => 'henrique', 'site' => 'henrique.com.br', 'uf' => 'mg', 'email' => 'henriquepro8@gmail.com']);
    use HasFactory;
}
