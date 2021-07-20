<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato (Request $request){
        
        /*echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        */
        /*
        $contato = new SiteContato();

        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        print_r($contato->getAttributes());
        $contato->save();
        */
        /*$contato = new SiteContato();
        $contato->fill($request->all());
        
        print_r($contato->getAttributes());
        $contato->save();
        */

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar (Request $request){
        
        //realizar validação antes do request

        $request->validate([
            'nome' =>'required|min:3|max:40|unique:site_contatos',
            'telefone' =>'required',
            'email' =>'email',
            'motivo_contatos_id' =>'required',
            'mensagem' =>'required|max:2000'

        ],
        [
            'nome.required' => 'O campo nome precisa ser preenchido!',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres!',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres!',
            'nome.unique' => 'já existe esse nome no sistema!',
            'telefone.required' => 'O campo telefone precisa ser preenchido!',
            'email.email' => 'O campo email precisa ser válido!',
            'motivo_contatos_id.required' => 'O campo Motivo contato precisa ser preenchido!',
            'mensagem.required' => 'O campo mensagem precisa ser preenchido!',
            'mensagem.max' => 'O campo mensagem não pode exceder 2000 caracteres!',
            
            //mensagem padrão
            'required' => 'O campo :attribute deve ser preenchido'

        ]
    
    );

        SiteContato::create($request->all());
        
        return redirect()->route('site.index');
    }
}
