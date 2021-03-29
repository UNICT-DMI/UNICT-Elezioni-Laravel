<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Candidato::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('nome', 'nome_lista', 'eletto');
        $lista = $data['nome_lista'];
        $listaController = new ListaController();
        $isPresent = false;
        $index = -1;

        foreach ($listaController->index() as $tmpLista) {
            if ($tmpLista->nome == $lista) {
                $isPresent = true;
                $index = $tmpLista->id;
                break;
            }
        }

        if ($isPresent) {
            $candidato = new Candidato();
            $candidato->nome = $data['nome'];
            $candidato->lista_id = $index;
            $candidato->eletto = $data['eletto'];
            $candidato->save();
        }

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        return $candidato;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        $data = $request->only('nome', 'nome_lista', 'eletto');
        $candidato->nome = $data['nome'];
        $candidato->nome = $data['nome_lista'];
        $candidato->nome = $data['eletto'];
        $candidato->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        $candidato->delete();
        return $this->index();
    }
}
