<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2){

        echo "A divisão de $p1 e $p2 é: ".($p1/$p2);
        ?>
        <br/>
        <?php
        return view('site.teste', ['x'=> $p1, 'y' => $p2]);

    }
}
