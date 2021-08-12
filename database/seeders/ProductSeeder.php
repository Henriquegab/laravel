<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['nome' => 'Iphone', 'descricao' => 'Iphone é caro bixx','peso' => 1,'unidade_id' => 1,]);
    }
}
