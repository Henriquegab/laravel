<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'MG';
        $fornecedor->email = 'henriquepro10@gmail.com';
        $fornecedor->save();

        // metodo create (atenção pro metodo fillable lá no models)
        Fornecedor::create([

            'nome' => 'Fornecedor 200',
            'site' => 'Fornecedor.ca',
            'uf' => 'SP',
            'email' => 'fornecedor200@gmail.com'



        ]);


        //insert (ta dando erro de type DB indefinido)
        /*DB::table('fornecedors')->insert([

            'nome' => 'Fornecedor 300',
            'site' => 'Fornecedor.uk',
            'uf' => 'RS',
            'email' => 'fornecedor300@gmail.com'
        ]);
        */
            

    }
}
