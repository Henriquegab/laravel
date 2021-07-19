<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $contato = new SiteContato();
        $contato->nome = 'lucas';
        $contato->telefone = '40028922';
        $contato->email = 'lucas@gmail.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'olá mundo!';
        $contato->save();
        */

        SiteContato::factory()->times(100)->create();


    }
}

// para executar o seeder -> php artisan db:seed ()nesse caso executa todos os seeders que estiverem no DatabaseSeeder.php
//php artisan db:seed --class=SiteContatoSeeder exetuta apenas este seeder