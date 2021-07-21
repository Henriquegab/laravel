<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create(['motivo_contato' => 'Dúvida']);
        MotivoContato::create(['motivo_contato' => 'Elogio']);
        MotivoContato::create(['motivo_contato' => 'Reclamação']);
        MotivoContato::create(['motivo_contato' => 'Reclamação 2']);
        MotivoContato::create(['motivo_contato' => 'Reclamação 3']);
        MotivoContato::create(['motivo_contato' => 'Reclamação 4']);
        MotivoContato::create(['motivo_contato' => 'Reclamação 5']);
        MotivoContato::create(['motivo_contato' => 'Reclamação 6']);
        MotivoContato::create(['motivo_contato' => 'Reclamação 7']);
    }
}
